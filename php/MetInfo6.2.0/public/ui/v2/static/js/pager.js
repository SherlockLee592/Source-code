/*
列表页翻页功能
 */
$(function(){
	// 翻页ajax加载
	if($(".met-pager-ajax,.met-page-ajax").length){
		var $met_pager=$('.met_pager'),
			$metpagerajax_link=$(".met-pager-ajax-link");
		if($met_pager.length){
			if($metpagerajax_link.hasClass("hidden-md-up")){
				Breakpoints.on('xs',{
	            	enter:function(){
						metpagerajax();
					}
				});
			}else{
				metpagerajax();
			}
	        setTimeout(function(){
				$metpagerajax_link.scrollFun(function(val){
		            val.appearDiy();
				});
			},0)
		}
	}
});
// 分页脚本
function metpagerajax(){
	var $metpagerbtn=$("#met-pager-btn"),
		$metpaget=$('#metPageT'),
		$metpagerajax=$(".met-pager-ajax,.met-page-ajax"),
		pageurl_str=$metpaget.data('pageurl'),
		pagemax=pageurl_str?parseInt(pageurl_str.split('|')[2]):1,
		page=parseInt($metpaget.val()),
		metpagerbtnText=function(){
			$metpagerbtn.removeClass('disabled').find('.fa-refresh').remove();
			$metpagerbtn.find('.wb-chevron-down').show();
			if(pagemax){
				if(pagemax==page) $metpagerbtn.attr({hidden:''})/*addClass('disabled').text('已经是最后一页了')*/;
			}else{
				$metpagerbtn.attr({hidden:''});
			}
		};
	metpagerbtnText();
	$metpagerbtn.click(function(){
		if(!$metpagerbtn.hasClass('disabled')){
			$(this).addClass('disabled').prepend('<i class="icon fa-refresh fa-spin"></i>').find('.wb-chevron-down').hide();
			page++;
			var pageurl=pageurl_str?pageurl_str.split('&page=')[0]:'';
			$.ajax({
				url:pageurl,
				type:'POST',
				data:{ajax:1,page:page},
				success:function(data){
					var $data=$(data).find('.met-pager-ajax,.met-page-ajax');
					if(!$data.length){
						data='<div class="met-pager-ajax">'+data+'</div>';
						$data=$(data);
					}
					$data.find('>').addClass('page'+page).removeClass('shown');
					data=$data.html();
					$metpagerajax.append(data);
					metpagerajaxFun(page);
					metpagerbtnText();
				}
			});
		}
	});
}
// 无刷新分页获取到数据追加到页面后，可以在此方法继续处理
function metpagerajaxFun(page){
	var $metpagerajax=$('.met-pager-ajax,.met-page-ajax'),
		metpager_original='.page'+page+' [data-original]'
		$data_appear=$metpagerajax.find('.page'+page+' [data-plugin="appear"]');
	if($metpagerajax.find(metpager_original).length){
		// 图片高度预设
		// setTimeout(function(){
			$metpagerajax.imageSize(metpager_original);
		// },0)
		// 图片延迟加载
	    if($metpagerajax.find(metpager_original).length) $metpagerajax.find(metpager_original).lazyload();
		setTimeout(function(){
			$('html,body').stop().animate({scrollTop:$(window).scrollTop()+2},0);
	    },300)
	}
    if($data_appear.length) $data_appear.trigger('appear');
	if($('#met-grid').length){
		setTimeout(function(){
			if(typeof metAnimOnScroll != 'undefined') metAnimOnScroll('met-grid');// 产品模块瀑布流
		},100)
	}
	// 获取翻页列表数据的浏览次数
	if($metpagerajax.find('.page'+page+' .met_hits').length){
		$metpagerajax.find('.page'+page+' .met_hits').each(function(index, el) {
			var $self=$(this);
			if($(this).data('src')){
				$.ajax({
					url:$(this).data('src'),
					type:'POST',
					success:function(result){
						if(result!='') $self.after(parseInt(result));
					}
				});
			}
		});
	}
}