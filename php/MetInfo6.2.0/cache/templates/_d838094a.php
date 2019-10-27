<?php
# MetInfo Enterprise Content Management System
# Copyright (C) MetInfo Co.,Ltd (http://www.metinfo.cn). All rights reserved.
defined('IN_MET') or exit('No permission');
$data['page_title']=$_M['word']['memberReg'].$data['page_title'];
?>
<?php
# MetInfo Enterprise Content Management System
# Copyright (C) MetInfo Co.,Ltd (http://www.metinfo.cn). All rights reserved.
defined('IN_MET') or exit('No permission');
?>
<?php
global $metinfover;
// 模板引擎
$metinfover                  = "v2";
$template_type                  = "tag";
// 栏目可用字段
$metadmin[categorynamemark]  = 1; // 栏目修饰名称
$metadmin[categoryimage]     = 1; // 栏目图片
$metadmin[categorymarkimage] = 0; // 栏目标识图片
// banner描述文字、文字位置、颜色等设置
$metadmin[system_flash_option_ok]=array(
	all=>1,
	img_des=>1,
	img_title_color=>1,
	img_des_color=>1,
	img_text_position=>1
);
?>
<?php $met_page=$template_type=='ui'?'index':''; ?>
<?php $met_page = "$met_page";?>
<?php
$metinfover_v2=$c["metinfover"]=="v2"?true:false;
$met_file_version=str_replace(".","",$c["metcms_v"]).$c["met_patch"];
$lang_json_file_ok=1;
if(!$lang_json_file_ok){
    echo "<meta http-equiv='refresh' content='0'/>";
}
$html_hidden=$lang_json_file_ok?"":"hidden";
if(!$data["module"] || $data["module"]==10){
    $nofollow=1;
}
$user_name=$_M["user"]?$_M["user"]["username"]:"";
?>
<!DOCTYPE HTML>
<html class="<?php echo $html_class;?>" <?php echo $html_hidden;?>>
<head>
<meta charset="utf-8">
<?php if($nofollow){ ?>
<meta name="robots" content="noindex,nofllow" />
<?php } ?>
<meta name="renderer" content="webkit">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=0,minimal-ui">
<meta name="format-detection" content="telephone=no">
<title><?php echo $data['page_title'];?></title>
<meta name="description" content="<?php echo $data['page_description'];?>">
<meta name="keywords" content="<?php echo $data['page_keywords'];?>">
<meta name="generator" content="MetInfo <?php echo $c['metcms_v'];?>" data-variable="<?php echo $c['met_weburl'];?>|<?php echo $data['lang'];?>|<?php echo $data['synchronous'];?>|<?php echo $c['met_skin_user'];?>|<?php echo $data['module'];?>|<?php echo $data['classnow'];?>|<?php echo $data['id'];?>" data-user_name="<?php echo $user_name;?>">
<link href="<?php echo $c['met_weburl'];?>favicon.ico" rel="shortcut icon" type="image/x-icon">
<?php
if($lang_json_file_ok){
    $basic_css_name=$metinfover_v2?"":"_web";
    if($c["temp_frame_version"]=="v2") $basic_css_name.="_v2";
    $is_lte_ie9=strpos($_SERVER["HTTP_USER_AGENT"],"MSIE 9")!==false || strpos($_SERVER["HTTP_USER_AGENT"],"MSIE 8")!==false;
    if($is_lte_ie9 && $c["temp_frame_version"]!="v2"){
        $lteie9_css_filemtime_1 = filemtime(PATH_WEB."public/ui/v2/static/css/basic".$basic_css_name."-lteie9-1.css");
        $lteie9_css_filemtime_2 = filemtime(PATH_WEB."public/ui/v2/static/css/basic".$basic_css_name."-lteie9-2.css");
?>
<link href="<?php echo $url['site'];?>public/ui/v2/static/css/basic<?php echo $basic_css_name;?>-lteie9-1.css?<?php echo $lteie9_css_filemtime_1;?>" rel="stylesheet" type="text/css">
<link href="<?php echo $url['site'];?>public/ui/v2/static/css/basic<?php echo $basic_css_name;?>-lteie9-2.css?<?php echo $lteie9_css_filemtime_2;?>" rel="stylesheet" type="text/css">
<?php
    }else{
        $basic_css_filemtime = filemtime(PATH_WEB."public/ui/v2/static/css/basic".$basic_css_name.".css");
?>
<link rel="stylesheet" type="text/css" href="<?php echo $url['site'];?>public/ui/v2/static/css/basic<?php echo $basic_css_name;?>.css?<?php echo $basic_css_filemtime;?>">
<?php
    }
    if($metinfover_v2){
        if(is_file(PATH_TEM."cache/common.css")){
            $common_css_time = filemtime(PATH_TEM."cache/common.css");
?>
<link rel="stylesheet" type="text/css" href="<?php echo $c['met_weburl'];?>templates/<?php echo $c['met_skin_user'];?>/cache/common.css?<?php echo $common_css_time;?>">
<?php
        }
        if($met_page){
            if($met_page == 404) $met_page = "show";
            $page_css = PATH_TEM."cache/".$met_page."_".$_M["lang"].".css";
            if(!is_file($page_css)){
                load::sys_class('view/ui_compile');
                $ui_compile = new ui_compile();
                $ui_compile->parse_page($met_page);
            }
            $page_css_time = filemtime($page_css);
?>
<link rel="stylesheet" type="text/css" href="<?php echo $c['met_weburl'];?>templates/<?php echo $c['met_skin_user'];?>/cache/<?php echo $met_page;?>_<?php echo $_M["lang"];?>.css?<?php echo $page_css_time;?>">
<?php
        }
    }
    if(is_mobile() && $c["met_headstat_mobile"]){
?>
<?php echo $c['met_headstat_mobile'];?>

<?php }else if(!is_mobile() && $c["met_headstat"]){?>
<?php echo $c['met_headstat'];?>

<?php
    }
    if($_M["html_plugin"]["head_script"]){
?>
<?php echo $_M["html_plugin"]["head_script"];?>

<?php } ?>
<style>
body{
<?php if($g["bodybgimg"]){ ?>
    background-image: url(<?php echo $g['bodybgimg'];?>) !important;background-position: center;background-repeat: no-repeat;
<?php } ?>
    background-color:<?php echo $g['bodybgcolor'];?> !important;font-family:<?php echo $g['met_font'];?> !important;}
h1,h2,h3,h4,h5,h6{font-family:<?php echo $g['met_font'];?> !important;}
</style>
<!--[if lte IE 9]>
<script src="<?php echo $_M["url"]["site"];?>public/ui/v2/static/js/lteie9.js"></script>
<![endif]-->
</head>
<!--[if lte IE 8]>
<div class="text-xs-center m-b-0 bg-blue-grey-100 alert">
    <button type="button" class="close" aria-label="Close" data-dismiss="alert">
        <span aria-hidden="true">×</span>
    </button>
    <?php echo $word['browserupdatetips'];?>
</div>
<![endif]-->
<body>
<?php } ?>
<header class='met-head' m-id='met_head' m-type="head_nav">
    <nav class="navbar navbar-default box-shadow-none met-nav">
        <div class="container">
            <div class="row">
                <div class='met-nav-btn'>
                        <?php if($data[classnow]==10001){ ?>
                    <h1 hidden><?php echo $c['met_webname'];?></h1>
                    <?php }else{ ?>
                        <?php if(!$data['id'] || $data['module']==1){ ?>
                    <h1 hidden><?php echo $data['name'];?></h1>
                    <?php } ?>
                    <h3 hidden><?php echo $c['met_webname'];?></h3>
                    <?php } ?>
                    <div class="navbar-header pull-xs-left">
                        <a href="<?php echo $c['index_url'];?>" class="met-logo vertical-align block pull-xs-left" title="<?php echo $c['met_webname'];?>">
                            <div class="vertical-align-middle">
                                <img src="<?php echo $c['met_logo'];?>" alt="<?php echo $c['met_webname'];?>"></div>
                        </a>
                    </div>
                    <button type="button" class="navbar-toggler hamburger hamburger-close collapsed p-x-5 p-y-0 met-nav-toggler" data-target="#met-nav-collapse" data-toggle="collapse">
                        <span class="sr-only"></span>
                        <span class="hamburger-bar"></span>
                    </button>
                        <?php if($c['met_member_register']){ ?>
                    <button type="button" class="navbar-toggler collapsed m-0 p-x-5 p-y-0 met-head-user-toggler" data-target="#met-head-user-collapse" data-toggle="collapse"> <i class="icon wb-user-circle" aria-hidden="true"></i>
                    </button>
                    <?php } ?>
                </div>
                <div class="collapse navbar-collapse navbar-collapse-toolbar pull-md-right p-0" id='met-head-user-collapse'>
                        <?php if($c['met_member_register']){ ?>
                        <?php if($user){ ?>
                    <ul class="navbar-nav pull-md-right vertical-align p-l-0 margin-bottom-0 met-head-user" m-id="member" m-type="member">
                        <li class="dropdown">
                            <a
                                href="javascript:;"
                                class="navbar-avatar dropdown-toggle"
                                data-toggle="dropdown"
                                aria-expanded="false"
                            >
                                <span class="avatar m-r-5"><img src="<?php echo $user['head'];?>" alt="<?php echo $user['username'];?>"/></span>
                                <?php echo $user['username'];?>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-right animate animate-reverse">
                                <li class='dropdown-item <?php echo $_M['config']['own_active']['0_1'];?>'>
                                    <a href="<?php echo $_M['url']['profile'];?>" title='<?php echo $_M['word']['memberIndex9'];?>'><i class="icon wb-user" aria-hidden="true"></i> <?php echo $_M['word']['memberIndex9'];?></a>
                                </li>
                                <li class='dropdown-item <?php echo $_M['config']['own_active']['0_2'];?>'>
                                    <a href="<?php echo $_M['url']['profile_safety'];?>" title='<?php echo $_M['word']['accsafe'];?>'><i class="icon wb-lock" aria-hidden="true"></i> <?php echo $_M['word']['accsafe'];?></a>
                                </li>
                                <div class="dropdown-divider"></div>
                                <?php
                                foreach($_M['html']['app_sidebar'] as $key=>$val){
                                    $val['active']=$_M['config']['own_active'][$val['no'].'_'.$val['own_order']];
                                    $val['target']=$val['target']?' target="_blank"':'';
                                ?>
                                <li class='dropdown-item <?php echo $val['active'];?>'>
                                    <a href="<?php echo $val['url'];?>" title="<?php echo $val['title'];?>"<?php echo $val['target'];?>><i class="icon fa-paper-plane" aria-hidden="true"></i> <?php echo $val['title'];?></a>
                                </li>
                                <?php } ?>
                                <div class="dropdown-divider"></div>
                                <li class='dropdown-item'>
                                    <a href="<?php echo $_M['url']['login_out'];?>"><i class="icon wb-power"></i> <?php echo $_M['word']['memberIndex10'];?></a>

                            </ul>
                        </li>
                    </ul>
                    <?php }else{ ?>
                    <ul class="navbar-nav pull-md-right vertical-align p-l-0 m-b-0 met-head-user no-login text-xs-center" m-id="member" m-type="member">
                        <li class=" text-xs-center vertical-align-middle animation-slide-top">
                            <a href="<?php echo $url['login'];?>" class="met_navbtn"><?php echo $word['login'];?></a>
                            <a href="<?php echo $url['register'];?>" class="met_navbtn"><?php echo $word['register'];?></a>
                        </li>
                    </ul>
                    <?php } ?>
                    <?php } ?>
                    <div class="metlang m-l-15 pull-md-right text-xs-center">
                            <?php if($c['met_ch_lang'] && $lang['cn1_position']==1){ ?>
                            <?php if($lang['cn1_ok']){ ?>
                            <?php if($data[lang]==cn || $data[lang]==zh){ ?>
                        <span id='btn-convert' class="met_navbtn" m-id="lang" m-type="lang">繁体</span>
                        <?php } ?>
                        <?php } ?>
                        <?php } ?>
                            <?php if($c['met_lang_mark'] && $lang['langlist_position']==1){ ?>
                        <div class="met-langlist vertical-align" m-type="lang" m-id="lang">
                            <div class="inline-block  dropdown">
                                <?php
    $language = load::sys_class('label', 'new')->get('language')->get_lang();
    $sub = count($language);
    $i = 0;
    foreach($language as $index=>$v):

        $v['_index']   = $index;
        $v['_first']   = $i == 0 ? true:false;

        $v['_last']    = $index == (count($language)-1) ? true : false;
        $v['sub'] = $sub;
        $i++;
?><?php endforeach;?>
                                    <?php if($sub>1){ ?>
                                <?php
    $language = load::sys_class('label', 'new')->get('language')->get_lang();
    $sub = count($language);
    $i = 0;
    foreach($language as $index=>$v):

        $v['_index']   = $index;
        $v['_first']   = $i == 0 ? true:false;

        $v['_last']    = $index == (count($language)-1) ? true : false;
        $v['sub'] = $sub;
        $i++;
?>
                                    <?php if($data['lang']==$v['mark']){ ?>
                                <span data-toggle="dropdown" class="met_navbtn dropdown-toggle">
                                        <?php if($lang['langlist1_icon_ok']){ ?>
                                    <img src="<?php echo $v['flag'];?>" alt="<?php echo $v['name'];?>" width="20">
                                    <?php } ?>
                                    <span><?php echo $v['name'];?></span>
                                </span>
                                <?php } ?>
                                <?php endforeach;?>
                                <ul class="dropdown-menu dropdown-menu-right animate animate-reverse" id="met-langlist-dropdown" role="menu">
                                    <?php
    $language = load::sys_class('label', 'new')->get('language')->get_lang();
    $sub = count($language);
    $i = 0;
    foreach($language as $index=>$v):

        $v['_index']   = $index;
        $v['_first']   = $i == 0 ? true:false;

        $v['_last']    = $index == (count($language)-1) ? true : false;
        $v['sub'] = $sub;
        $i++;
?>
                                    <a href="<?php echo $v['met_weburl'];?>" title="<?php echo $v['name'];?>"     <?php if($v[newwindows]==1){ ?>target="_blank"<?php } ?> class='dropdown-item'>
                                            <?php if($lang['langlist1_icon_ok']){ ?>
                                        <img src="<?php echo $v['flag'];?>" alt="<?php echo $v['name'];?>" width="20">
                                        <?php } ?>
                                        <?php echo $v['name'];?>
                                    </a>
                                    <?php endforeach;?>
                                </ul>
                                <?php } ?>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                </div>
                <div class="collapse navbar-collapse navbar-collapse-toolbar pull-md-right p-0" id="met-nav-collapse">
                    <ul class="nav navbar-nav navlist">
                        <li class='nav-item'>
                            <a href="<?php echo $c['index_url'];?>" title="<?php echo $word['home'];?>" class="nav-link
                                <?php if($data['classnow']==10001){ ?>
                            active
                            <?php } ?>
                            "><?php echo $word['home'];?></a>
                        </li>
                        <?php
    $type=strtolower(trim('head'));
    $cid=0;
    $column = load::sys_class('label', 'new')->get('column');

    unset($result);
    switch ($type) {
            case 'son':
                $result = $column->get_column_son($cid);
                break;
            case 'current':
                $result[0] = $column->get_column_id($cid);
                break;
            case 'head':
                $result = $column->get_column_head();
                break;
            case 'foot':
                $result = $column->get_column_foot();
                break;
            default:
                $result[0] = $column->get_column_id($cid);
                break;
        }
    $sub = count($result);
    foreach($result as $index=>$m):
        $hides = 1;
        $hide = explode("|",$hides);
        $m['_index']= $index;
        if($data['classnow']==$m['id'] || $data['class1']==$m['id'] || $data['class2']==$m['id'] || $data['releclass'] == $m['id']){
            $m['class']="active";
        }else{
            $m['class'] = '';
        }
        if(in_array($m['name'],$hide)){
            unset($m['id']);
            $m['hide'] = $hide;
            $m['sub'] = 0;
        }


        if(substr(trim($m['icon']),0,1) == 'm' || substr(trim($m['icon']),0,1) == ''){
            $m['icon'] = 'icon fa-pencil-square-o '.$m['icon'];
        }
        $m['urlnew'] = $m['new_windows'] ? "target='_blank'" :"target='_self'";
        $m['urlnew'] = $m['nofollow'] ? $m['urlnew']." rel='nofollow'" :$m['urlnew'];
        $m['_first']=$index==0 ? true:false;
        $m['_last']=$index==(count($result)-1)?true:false;
        $$m = $m;
?>
                            <?php if($lang['navbarok'] && $m['sub']){ ?>
                        <li class="nav-item dropdown m-l-<?php echo $lang['nav_ml'];?>">
                                <?php if($lang['navbarok']){ ?>
                            <a
                                href="<?php echo $m['url'];?>"
                                title="<?php echo $m['name'];?>"
                                <?php echo $m['urlnew'];?>
                                class="nav-link dropdown-toggle <?php echo $m['class'];?>"
                                data-toggle="dropdown" data-hover="dropdown"
                            >
                            <?php }else{ ?>
                            <a
                                href="<?php echo $m['url'];?>"
                                <?php echo $m['urlnew'];?>
                                title="<?php echo $m['name'];?>"
                                class="nav-link dropdown-toggle <?php echo $m['class'];?>"
                                data-toggle="dropdown"
                            >
                            <?php } ?>
                            <?php echo $m['name'];?><span class="fa fa-angle-down p-l-5"></span></a>
                                <?php if($lang['navbullet_ok']){ ?>
                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-bullet animate animate-reverse">
                            <?php }else{ ?>
                            <div class="dropdown-menu dropdown-menu-right animate animate-reverse">
                            <?php } ?>
                                <?php if($m['module']<>1){ ?>
                                <a href="<?php echo $m['url'];?>" <?php echo $m['urlnew'];?>  title="<?php echo $lang['all'];?>" class='dropdown-item nav-parent hidden-lg-up <?php echo $m['class'];?>'><?php echo $lang['all'];?></a>
                            <?php } ?>
                                <?php
    $type=strtolower(trim('son'));
    $cid=$m['id'];
    $column = load::sys_class('label', 'new')->get('column');

    unset($result);
    switch ($type) {
            case 'son':
                $result = $column->get_column_son($cid);
                break;
            case 'current':
                $result[0] = $column->get_column_id($cid);
                break;
            case 'head':
                $result = $column->get_column_head();
                break;
            case 'foot':
                $result = $column->get_column_foot();
                break;
            default:
                $result[0] = $column->get_column_id($cid);
                break;
        }
    $sub = count($result);
    foreach($result as $index=>$m):
        $hides = 1;
        $hide = explode("|",$hides);
        $m['_index']= $index;
        if($data['classnow']==$m['id'] || $data['class1']==$m['id'] || $data['class2']==$m['id'] || $data['releclass'] == $m['id']){
            $m['class']="active";
        }else{
            $m['class'] = '';
        }
        if(in_array($m['name'],$hide)){
            unset($m['id']);
            $m['hide'] = $hide;
            $m['sub'] = 0;
        }


        if(substr(trim($m['icon']),0,1) == 'm' || substr(trim($m['icon']),0,1) == ''){
            $m['icon'] = 'icon fa-pencil-square-o '.$m['icon'];
        }
        $m['urlnew'] = $m['new_windows'] ? "target='_blank'" :"target='_self'";
        $m['urlnew'] = $m['nofollow'] ? $m['urlnew']." rel='nofollow'" :$m['urlnew'];
        $m['_first']=$index==0 ? true:false;
        $m['_last']=$index==(count($result)-1)?true:false;
        $$m = $m;
?>
                                    <?php if($m['sub']){ ?>
                                <div class="dropdown-submenu">
                                    <a href="<?php echo $m['url'];?>" <?php echo $m['urlnew'];?> class="dropdown-item <?php echo $m['class'];?>"><?php echo $m['name'];?></a>
                                    <div class="dropdown-menu animate animate-reverse">
                                        <?php
    $type=strtolower(trim('son'));
    $cid=$m['id'];
    $column = load::sys_class('label', 'new')->get('column');

    unset($result);
    switch ($type) {
            case 'son':
                $result = $column->get_column_son($cid);
                break;
            case 'current':
                $result[0] = $column->get_column_id($cid);
                break;
            case 'head':
                $result = $column->get_column_head();
                break;
            case 'foot':
                $result = $column->get_column_foot();
                break;
            default:
                $result[0] = $column->get_column_id($cid);
                break;
        }
    $sub = count($result);
    foreach($result as $index=>$m):
        $hides = 1;
        $hide = explode("|",$hides);
        $m['_index']= $index;
        if($data['classnow']==$m['id'] || $data['class1']==$m['id'] || $data['class2']==$m['id'] || $data['releclass'] == $m['id']){
            $m['class']="active";
        }else{
            $m['class'] = '';
        }
        if(in_array($m['name'],$hide)){
            unset($m['id']);
            $m['hide'] = $hide;
            $m['sub'] = 0;
        }


        if(substr(trim($m['icon']),0,1) == 'm' || substr(trim($m['icon']),0,1) == ''){
            $m['icon'] = 'icon fa-pencil-square-o '.$m['icon'];
        }
        $m['urlnew'] = $m['new_windows'] ? "target='_blank'" :"target='_self'";
        $m['urlnew'] = $m['nofollow'] ? $m['urlnew']." rel='nofollow'" :$m['urlnew'];
        $m['_first']=$index==0 ? true:false;
        $m['_last']=$index==(count($result)-1)?true:false;
        $$m = $m;
?>
                                            <a href="<?php echo $m['url'];?>" <?php echo $m['urlnew'];?> class="dropdown-item <?php echo $m['class'];?>" ><?php echo $m['name'];?></a>
                                        <?php endforeach;?>
                                    </div>
                                </div>
                                <?php }else{ ?>
                                <a href="<?php echo $m['url'];?>" <?php echo $m['urlnew'];?> title="<?php echo $m['name'];?>" class='dropdown-item <?php echo $m['class'];?>'><?php echo $m['name'];?></a>
                                <?php } ?>
                                <?php endforeach;?>
                            </div>
                        </li>
                        <?php }else{ ?>
                        <li class='nav-item'>
                            <a href="<?php echo $m['url'];?>" <?php echo $m['urlnew'];?> title="<?php echo $m['name'];?>" class="nav-link <?php echo $m['class'];?>"><?php echo $m['name'];?></a>
                        </li>
                        <?php } ?>
                        <?php endforeach;?>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
</header>
    <?php if($data['classnow']){ ?>
<?php 
    $banner = load::sys_class('label', 'new')->get('banner')->get_column_banner($data['classnow']);
    $sub = count($banner['img']);
    foreach($banner['img'] as $index=>$v):
        $v['_index']   = $index;
        $v['_first']   = $index == 0 ? true:false;
        $v['_last']    = $index == (count($result)-1) ? true : false;
        $v['type'] = $banner['config']['type'];
        $v['y'] = $banner['config']['y'];
        $v['sub'] = $sub;
?><?php endforeach;?>
    <?php if($sub || $data['classnow']==10001){ ?>
<div class="met-banner carousel slide" id="exampleCarouselDefault" data-ride="carousel" m-id='banner'  m-type='banner'>
    <ol class="carousel-indicators carousel-indicators-fall">
        <?php 
    $banner = load::sys_class('label', 'new')->get('banner')->get_column_banner($data['classnow']);
    $sub = count($banner['img']);
    foreach($banner['img'] as $index=>$v):
        $v['_index']   = $index;
        $v['_first']   = $index == 0 ? true:false;
        $v['_last']    = $index == (count($result)-1) ? true : false;
        $v['type'] = $banner['config']['type'];
        $v['y'] = $banner['config']['y'];
        $v['sub'] = $sub;
?>
            <li data-slide-to="<?php echo $v['_index'];?>" data-target="#exampleCarouselDefault" class="    <?php if($v['_first']){ ?>active<?php } ?>"></li>
        <?php endforeach;?>
    </ol>
    <div class="carousel-inner     <?php if($data['classnow']==10001 && $sub==0){ ?>met-banner-mh<?php } ?>" role="listbox">
        <?php 
    $banner = load::sys_class('label', 'new')->get('banner')->get_column_banner($data['classnow']);
    $sub = count($banner['img']);
    foreach($banner['img'] as $index=>$v):
        $v['_index']   = $index;
        $v['_first']   = $index == 0 ? true:false;
        $v['_last']    = $index == (count($result)-1) ? true : false;
        $v['type'] = $banner['config']['type'];
        $v['y'] = $banner['config']['y'];
        $v['sub'] = $sub;
?>
            <div class="carousel-item     <?php if($v['_first']){ ?>active<?php } ?>">
                <?php if($v['img_link']){ ?>
                <a href="<?php echo $v['img_link'];?>" title="<?php echo $v['img_des'];?>" target='_blank'>
            <?php } ?>
                <img class="w-full" src="<?php echo $v['img_path'];?>" srcset='<?php echo $v['img_path'];?> 767w,<?php echo $v['img_path'];?>' sizes="(max-width: 767px) 767px" alt="<?php echo $v['img_title'];?>" pch="<?php echo $v['height'];?>" adh="<?php echo $v['height_t'];?>" iph="<?php echo $v['height_m'];?>">
                    <?php if($v['img_title']){ ?>
                    <div class="met-banner-text" met-imgmask>
                        <div class='container'>
                            <div class='met-banner-text-con p-<?php echo $v['img_text_position'];?>'>
                                <div>
                                    <h3 class="animation-slide-top animation-delay-300 font-weight-500" style="color:<?php echo $v['img_title_color'];?>"><?php echo $v['img_title'];?></h3>
                                    <p class="animation-slide-bottom animation-delay-600" style='color:<?php echo $v['img_des_color'];?>'><?php echo $v['img_des'];?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                <?php if($v['img_link']){ ?>
                </a>
            <?php } ?>
            </div>
        <?php endforeach;?>
        <a class="left carousel-control" href="#exampleCarouselDefault" role="button" data-slide="prev">
          <span class="icon" aria-hidden="true"><</span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#exampleCarouselDefault" role="button" data-slide="next">
          <span class="icon" aria-hidden="true">></span>
          <span class="sr-only">Next</span>
        </a>
    </div>
</div>
<?php }else{ ?>
<?php
    $type=strtolower(trim('current'));
    $cid=$data['class1'];
    $column = load::sys_class('label', 'new')->get('column');

    unset($result);
    switch ($type) {
            case 'son':
                $result = $column->get_column_son($cid);
                break;
            case 'current':
                $result[0] = $column->get_column_id($cid);
                break;
            case 'head':
                $result = $column->get_column_head();
                break;
            case 'foot':
                $result = $column->get_column_foot();
                break;
            default:
                $result[0] = $column->get_column_id($cid);
                break;
        }
    $sub = count($result);
    foreach($result as $index=>$m):
        $hides = 1;
        $hide = explode("|",$hides);
        $m['_index']= $index;
        if($data['classnow']==$m['id'] || $data['class1']==$m['id'] || $data['class2']==$m['id'] || $data['releclass'] == $m['id']){
            $m['class']="";
        }else{
            $m['class'] = '';
        }
        if(in_array($m['name'],$hide)){
            unset($m['id']);
            $m['hide'] = $hide;
            $m['sub'] = 0;
        }


        if(substr(trim($m['icon']),0,1) == 'm' || substr(trim($m['icon']),0,1) == ''){
            $m['icon'] = 'icon fa-pencil-square-o '.$m['icon'];
        }
        $m['urlnew'] = $m['new_windows'] ? "target='_blank'" :"target='_self'";
        $m['urlnew'] = $m['nofollow'] ? $m['urlnew']." rel='nofollow'" :$m['urlnew'];
        $m['_first']=$index==0 ? true:false;
        $m['_last']=$index==(count($result)-1)?true:false;
        $$m = $m;
?>
<div class="met-banner-ny vertical-align text-center" m-id="banner">
        <?php if($m['module']==1){ ?>
        <h2 class="vertical-align-middle"><?php echo $m['name'];?></h2>
        <?php }else{ ?>
        <h3 class="vertical-align-middle"><?php echo $m['name'];?></h3>
    <?php } ?>
</div>
<?php endforeach;?>
<?php } ?>
    <?php if($data['classnow']<>10001){ ?>
    <?php if($lang['tagshow_1']){ ?>
<section class="met-crumbs hidden-sm-down" m-id='met_position' m-type='nocontent'>
    <div class="container">
        <div class="row">
            <div class="border-bottom clearfix">
                <ol class="breadcrumb m-b-0 subcolumn-crumbs breadcrumb-arrow">
                    <li class='breadcrumb-item'>
                        <?php echo $lang['position_text'];?>
                    </li>
                    <li class='breadcrumb-item'>
                        <a href="<?php echo $c['met_weburl'];?>" title="<?php echo $word['home'];?>" class='icon wb-home'><?php echo $word['home'];?></a>
                    </li>
                    <?php
    $cid = 0;
    if(!$cid){
        $cid = $data['classnow'];
    }
    $location = load::sys_class('label', 'new')->get('column')->get_class123_reclass($cid);
    $location_data = array();
    $location_data[0] = $location['class1'];
    $location_data[1] = $location['class2'];
    $location_data[2] = $location['class3'];
    unset($location);
    foreach($location_data as $index=> $v):
?>
                        <?php if($v){ ?>
                        <li class='breadcrumb-item'>
                            <a href="<?php echo $v['url'];?>" title="<?php echo $v['name'];?>" class='<?php echo $v['class'];?>'><?php echo $v['name'];?></a>
                        </li>
                    <?php } ?>
                    <?php endforeach;?>
                </ol>
            </div>
        </div>
    </div>
</section>
<?php } ?>
    <?php if($lang['tagshow_2']){ ?>
<?php
    $type=strtolower(trim('current'));
    $cid=$data['class1'];
    $column = load::sys_class('label', 'new')->get('column');

    unset($result);
    switch ($type) {
            case 'son':
                $result = $column->get_column_son($cid);
                break;
            case 'current':
                $result[0] = $column->get_column_id($cid);
                break;
            case 'head':
                $result = $column->get_column_head();
                break;
            case 'foot':
                $result = $column->get_column_foot();
                break;
            default:
                $result[0] = $column->get_column_id($cid);
                break;
        }
    $sub = count($result);
    foreach($result as $index=>$m):
        $hides = 1;
        $hide = explode("|",$hides);
        $m['_index']= $index;
        if($data['classnow']==$m['id'] || $data['class1']==$m['id'] || $data['class2']==$m['id'] || $data['releclass'] == $m['id']){
            $m['class']="";
        }else{
            $m['class'] = '';
        }
        if(in_array($m['name'],$hide)){
            unset($m['id']);
            $m['hide'] = $hide;
            $m['sub'] = 0;
        }


        if(substr(trim($m['icon']),0,1) == 'm' || substr(trim($m['icon']),0,1) == ''){
            $m['icon'] = 'icon fa-pencil-square-o '.$m['icon'];
        }
        $m['urlnew'] = $m['new_windows'] ? "target='_blank'" :"target='_self'";
        $m['urlnew'] = $m['nofollow'] ? $m['urlnew']." rel='nofollow'" :$m['urlnew'];
        $m['_first']=$index==0 ? true:false;
        $m['_last']=$index==(count($result)-1)?true:false;
        $$m = $m;
?>
    <?php if($m['sub']){ ?>
<section class="met-column-nav" m-id="subcolumn_nav" m-type="nocontent">
    <div class="container">
        <div class="row">
            <ul class="clearfix met-column-nav-ul">
                <?php
    $type=strtolower(trim('current'));
    $cid=$data['class1'];
    $column = load::sys_class('label', 'new')->get('column');

    unset($result);
    switch ($type) {
            case 'son':
                $result = $column->get_column_son($cid);
                break;
            case 'current':
                $result[0] = $column->get_column_id($cid);
                break;
            case 'head':
                $result = $column->get_column_head();
                break;
            case 'foot':
                $result = $column->get_column_foot();
                break;
            default:
                $result[0] = $column->get_column_id($cid);
                break;
        }
    $sub = count($result);
    foreach($result as $index=>$m):
        $hides = 1;
        $hide = explode("|",$hides);
        $m['_index']= $index;
        if($data['classnow']==$m['id'] || $data['class1']==$m['id'] || $data['class2']==$m['id'] || $data['releclass'] == $m['id']){
            $m['class']="active";
        }else{
            $m['class'] = '';
        }
        if(in_array($m['name'],$hide)){
            unset($m['id']);
            $m['hide'] = $hide;
            $m['sub'] = 0;
        }


        if(substr(trim($m['icon']),0,1) == 'm' || substr(trim($m['icon']),0,1) == ''){
            $m['icon'] = 'icon fa-pencil-square-o '.$m['icon'];
        }
        $m['urlnew'] = $m['new_windows'] ? "target='_blank'" :"target='_self'";
        $m['urlnew'] = $m['nofollow'] ? $m['urlnew']." rel='nofollow'" :$m['urlnew'];
        $m['_first']=$index==0 ? true:false;
        $m['_last']=$index==(count($result)-1)?true:false;
        $$m = $m;
?>
                    <?php if($m['module']<>1){ ?>
                    <li>
                        <a href="<?php echo $m['url'];?>"  title="<?php echo $lang['sub_all'];?>"     <?php if($data['classnow']==$m['id']){ ?>class="active"<?php } ?>><?php echo $lang['sub_all'];?></a>
                    </li>
                    <?php }else{ ?>
                        <?php if($m[isshow]){ ?>
                    <li>
                        <a href="<?php echo $m['url'];?>"  title="<?php echo $m['name'];?>"     <?php if($data['classnow']==$m['id']){ ?>class="active"<?php } ?>><?php echo $m['name'];?></a>
                    </li>
                    <?php } ?>
                <?php } ?>
                <?php
    $type=strtolower(trim('son'));
    $cid=$m['id'];
    $column = load::sys_class('label', 'new')->get('column');

    unset($result);
    switch ($type) {
            case 'son':
                $result = $column->get_column_son($cid);
                break;
            case 'current':
                $result[0] = $column->get_column_id($cid);
                break;
            case 'head':
                $result = $column->get_column_head();
                break;
            case 'foot':
                $result = $column->get_column_foot();
                break;
            default:
                $result[0] = $column->get_column_id($cid);
                break;
        }
    $sub = count($result);
    foreach($result as $index=>$m):
        $hides = 1;
        $hide = explode("|",$hides);
        $m['_index']= $index;
        if($data['classnow']==$m['id'] || $data['class1']==$m['id'] || $data['class2']==$m['id'] || $data['releclass'] == $m['id']){
            $m['class']="active";
        }else{
            $m['class'] = '';
        }
        if(in_array($m['name'],$hide)){
            unset($m['id']);
            $m['hide'] = $hide;
            $m['sub'] = 0;
        }


        if(substr(trim($m['icon']),0,1) == 'm' || substr(trim($m['icon']),0,1) == ''){
            $m['icon'] = 'icon fa-pencil-square-o '.$m['icon'];
        }
        $m['urlnew'] = $m['new_windows'] ? "target='_blank'" :"target='_self'";
        $m['urlnew'] = $m['nofollow'] ? $m['urlnew']." rel='nofollow'" :$m['urlnew'];
        $m['_first']=$index==0 ? true:false;
        $m['_last']=$index==(count($result)-1)?true:false;
        $$m = $m;
?>
                        <?php if($m['sub']){ ?>
                        <li class="dropdown">
                            <a href="<?php echo $m['url'];?>" title="<?php echo $m['name'];?>" class="dropdown-toggle     <?php if($data['classnow']==$m['id']){ ?>active<?php } ?>" data-toggle="dropdown"><?php echo $m['name'];?></a>
                            <div class="dropdown-menu animate">
                                    <?php if($data['class1']['module']<>1){ ?>
                                    <a href="<?php echo $m['url'];?>"  title="<?php echo $lang['sub_all'];?>" class='dropdown-item <?php echo $m['class'];?>'><?php echo $lang['sub_all'];?></a>
                                <?php } ?>
                                <?php
    $type=strtolower(trim('son'));
    $cid=$m['id'];
    $column = load::sys_class('label', 'new')->get('column');

    unset($result);
    switch ($type) {
            case 'son':
                $result = $column->get_column_son($cid);
                break;
            case 'current':
                $result[0] = $column->get_column_id($cid);
                break;
            case 'head':
                $result = $column->get_column_head();
                break;
            case 'foot':
                $result = $column->get_column_foot();
                break;
            default:
                $result[0] = $column->get_column_id($cid);
                break;
        }
    $sub = count($result);
    foreach($result as $index=>$m):
        $hides = 1;
        $hide = explode("|",$hides);
        $m['_index']= $index;
        if($data['classnow']==$m['id'] || $data['class1']==$m['id'] || $data['class2']==$m['id'] || $data['releclass'] == $m['id']){
            $m['class']="active";
        }else{
            $m['class'] = '';
        }
        if(in_array($m['name'],$hide)){
            unset($m['id']);
            $m['hide'] = $hide;
            $m['sub'] = 0;
        }


        if(substr(trim($m['icon']),0,1) == 'm' || substr(trim($m['icon']),0,1) == ''){
            $m['icon'] = 'icon fa-pencil-square-o '.$m['icon'];
        }
        $m['urlnew'] = $m['new_windows'] ? "target='_blank'" :"target='_self'";
        $m['urlnew'] = $m['nofollow'] ? $m['urlnew']." rel='nofollow'" :$m['urlnew'];
        $m['_first']=$index==0 ? true:false;
        $m['_last']=$index==(count($result)-1)?true:false;
        $$m = $m;
?>
                                <a href="<?php echo $m['url'];?>" title="<?php echo $m['name'];?>" class='dropdown-item <?php echo $m['class'];?>'><?php echo $m['name'];?></a>
                                <?php endforeach;?>
                            </div>
                        </li>
                        <?php }else{ ?>
                        <li>
                            <a href="<?php echo $m['url'];?>" title="<?php echo $m['name'];?>" class='<?php echo $m['class'];?>'><?php echo $m['name'];?></a>
                        </li>
                    <?php } ?>
                <?php endforeach;?>
                <?php endforeach;?>
            </ul>
        </div>
    </div>
</section>
<?php } ?>
<?php endforeach;?>
<?php } ?>
<?php } ?>
<?php } ?>
<?php
if(file_exists(PATH_OWN_FILE."templates/met/css/metinfo.css")){
	$own_metinfo_css_filemtime = filemtime(PATH_OWN_FILE.'templates/met/css/metinfo.css');
?>
<link href="<?php echo $_M['url']['own_tem'];?>css/metinfo.css?<?php echo $own_metinfo_css_filemtime;?>" rel='stylesheet' type='text/css'>
<?php } ?>
<div class="register-index met-member page p-y-50 bg-pagebg1">
	<div class="container">
		<form class="form-register met-form met-form-validation panel panel-body" method="post" action="<?php echo $_M['url']['register_save'];?>">
			<h1 class='m-t-0 m-b-20 font-size-24 text-xs-center'><?php echo $_M['word']['memberReg'];?></h1>
			<?php
			switch ($_M['config']['met_member_vecan']) {
				case 1:
			?>
			<?php
# MetInfo Enterprise Content Management System
# Copyright (C) MetInfo Co.,Ltd (http://www.metinfo.cn). All rights reserved.
defined('IN_MET') or exit('No permission');
?>
<div class="form-group">
	<div class="input-group">
		<span class="input-group-addon"><i class="fa fa-envelope"></i></span>
		<input type="email" name="username" required class="form-control" placeholder="<?php echo $_M['word']['memberemail'];?>"
		data-fv-remote="true"
		data-fv-remote-url="<?php echo $_M['url']['register_userok'];?>"
		data-fv-remote-message="<?php echo $_M['word']['emailhave'];?>"

		data-fv-notempty-message="<?php echo $_M['word']['noempty'];?>"

		data-fv-stringlength="true"
		data-fv-stringlength-min="2"
		data-fv-stringlength-max="30"
		data-fv-stringlength-message="<?php echo $_M['word']['usernamecheck'];?>"

		data-fv-emailaddress="true"
		data-fv-emailaddress-message="<?php echo $_M['word']['emailcheck'];?>"
		/>
	</div>
</div>
<div class="form-group">
	<div class="input-group">
		<span class="input-group-addon"><i class="fa fa-unlock-alt"></i></span>
		<input type="password" name="password" required class="form-control" placeholder="<?php echo $_M['word']['password'];?>"
		data-fv-notempty-message="<?php echo $_M['word']['noempty'];?>"

		data-fv-identical="true"
		data-fv-identical-field="confirmpassword"
		data-fv-identical-message="<?php echo $_M['word']['passwordsame'];?>"

		data-fv-stringlength="true"
		data-fv-stringlength-min="3"
		data-fv-stringlength-max="30"
		data-fv-stringlength-message="<?php echo $_M['word']['passwordcheck'];?>"
		>
	</div>
</div>
<div class="form-group">
	<div class="input-group">
		<span class="input-group-addon"><i class="fa fa-unlock-alt"></i></span>
		<input type="password" name="confirmpassword" required data-password="password" class="form-control" placeholder="<?php echo $_M['word']['renewpassword'];?>"
		data-fv-identical="true"
		data-fv-identical-field="password"
		data-fv-identical-message="<?php echo $_M['word']['passwordsame'];?>"
		>
	</div>
</div>
<?php
 if($_M['config']['met_memberlogin_code']){ ?>
<div class="form-group">
    <div class="input-group input-group-icon">
        <span class="input-group-addon"><i class="fa fa-shield"></i></span>
        <input type="text" name="code" required class="form-control" placeholder="<?php echo $_M['word']['memberImgCode'];?>" data-fv-notempty-message="<?php echo $_M['word']['noempty'];?>">
        <div class="input-group-addon p-5 login-code-img">
            <img src="<?php echo $_M[url][entrance];?>?m=include&c=ajax_pin&a=dogetpin" title="<?php echo $_M['word']['memberTip1'];?>" id='getcode' align="absmiddle" role="button">
        </div>
    </div>
</div>

<?php } ?>
			<?php
					break;
				case 3:
			?>
			<?php
# MetInfo Enterprise Content Management System
# Copyright (C) MetInfo Co.,Ltd (http://www.metinfo.cn). All rights reserved.
defined('IN_MET') or exit('No permission');
?>
<div class="form-group">
	<div class="input-group">
		<span class="input-group-addon"><i class="fa fa-mobile"></i></span>
		<input type="text" name="phone" required class="form-control" placeholder="<?php echo $_M['word']['memberbasicCell'];?>"
		data-fv-phone="true"
		data-fv-phone-message="<?php echo $_M['word']['telok'];?>"

		data-fv-notempty-message="<?php echo $_M['word']['noempty'];?>"

		data-fv-stringlength="true"
		data-fv-stringlength-min="2"
		data-fv-stringlength-max="30"
		data-fv-stringlength-message="<?php echo $_M['word']['usernamecheck'];?>"
		/>
	</div>
</div>
<div class="form-group">
	<div class="input-group">
		<span class="input-group-addon"><i class="fa fa-unlock-alt"></i></span>
		<input type="password" name="password" required class="form-control" placeholder="<?php echo $_M['word']['password'];?>"
		data-fv-notempty-message="<?php echo $_M['word']['noempty'];?>"

		data-fv-identical="true"
		data-fv-identical-field="confirmpassword"
		data-fv-identical-message="<?php echo $_M['word']['passwordsame'];?>"

		data-fv-stringlength="true"
		data-fv-stringlength-min="3"
		data-fv-stringlength-max="30"
		data-fv-stringlength-message="<?php echo $_M['word']['passwordcheck'];?>"
		>
	</div>
</div>
<div class="form-group">
	<div class="input-group">
		<span class="input-group-addon"><i class="fa fa-unlock-alt"></i></span>
		<input type="password" name="confirmpassword" required data-password="password" class="form-control" placeholder="<?php echo $_M['word']['renewpassword'];?>"
		data-fv-identical="true"
		data-fv-identical-field="password"
		data-fv-identical-message="<?php echo $_M['word']['passwordsame'];?>"
		>
	</div>
</div>
<div class="form-group">
    <div class="input-group input-group-icon">
        <span class="input-group-addon"><i class="fa fa-shield"></i></span>
        <input type="text" name="code" required class="form-control" placeholder="<?php echo $_M['word']['memberImgCode'];?>" data-fv-notempty-message="<?php echo $_M['word']['noempty'];?>">
        <div class="input-group-addon p-5 login-code-img">
            <img src="<?php echo $_M[url][entrance];?>?m=include&c=ajax_pin&a=dogetpin" title="<?php echo $_M['word']['memberTip1'];?>" id='getcode' align="absmiddle" role="button">
        </div>
    </div>
</div>
<div class="form-group">
    <div class="input-group input-group-icon">
        <input type="text" name="phonecode" required class="form-control" placeholder="<?php echo $_M['word']['memberImgCode'];?>" data-fv-notempty-message="<?php echo $_M['word']['noempty'];?>">
        <div class="input-group-addon p-0">
            <button type="button" data-url="<?php echo $_M['url']['valid_phone'];?>" class="btn btn-success btn-squared w-full phone-code" data-retxt="<?php echo $_M['word']['resend'];?>">
                <?php echo $_M['word']['phonecode'];?>
                <span class="badge"></span>
            </button>
        </div>
    </div>
</div>
			<?php
					break;
				default:
			?>
			<?php
# MetInfo Enterprise Content Management System
# Copyright (C) MetInfo Co.,Ltd (http://www.metinfo.cn). All rights reserved.
defined('IN_MET') or exit('No permission');
?>
<div class="form-group">
	<div class="input-group">
		<span class="input-group-addon"><i class="fa fa-user"></i></span>
		<input type="text" name="username" required class="form-control" placeholder="<?php echo $_M['word']['memberName'];?>"
		data-fv-remote="true"
		data-fv-remote-url="<?php echo $_M['url']['register_userok'];?>"
		data-fv-remote-message="<?php echo $_M['word']['userhave'];?>"

		data-fv-notempty-message="<?php echo $_M['word']['noempty'];?>"

		data-fv-stringlength="true"
		data-fv-stringlength-min="2"
		data-fv-stringlength-max="30"
		data-fv-stringlength-message="<?php echo $_M['word']['usernamecheck'];?>"
		/>
	</div>
</div>
<div class="form-group">
	<div class="input-group">
		<span class="input-group-addon"><i class="fa fa-unlock-alt"></i></span>
		<input type="password" name="password" required class="form-control" placeholder="<?php echo $_M['word']['password'];?>"
		data-fv-notempty-message="<?php echo $_M['word']['noempty'];?>"

		data-fv-identical="true"
		data-fv-identical-field="confirmpassword"
		data-fv-identical-message="<?php echo $_M['word']['passwordsame'];?>"

		data-fv-stringlength="true"
		data-fv-stringlength-min="6"
		data-fv-stringlength-max="30"
		data-fv-stringlength-message="<?php echo $_M['word']['passwordcheck'];?>"
		>
	</div>
</div>
<div class="form-group">
	<div class="input-group">
		<span class="input-group-addon"><i class="fa fa-unlock-alt"></i></span>
		<input type="password" name="confirmpassword" required data-password="password" class="form-control" placeholder="<?php echo $_M['word']['renewpassword'];?>"
		data-fv-identical="true"
		data-fv-identical-field="password"
		data-fv-identical-message="<?php echo $_M['word']['passwordsame'];?>"
		data-fv-notempty-message="<?php echo $_M['word']['noempty'];?>"
		>

	</div>
</div>
<?php if($_M['config']['met_memberlogin_code']){ ?>
<div class="form-group">
    <div class="input-group input-group-icon">
        <span class="input-group-addon"><i class="fa fa-shield"></i></span>
        <input type="text" name="code" required class="form-control" placeholder="<?php echo $_M['word']['memberImgCode'];?>" data-fv-notempty-message="<?php echo $_M['word']['noempty'];?>">
        <div class="input-group-addon p-5 login-code-img">
            <img src="<?php echo $_M[url][entrance];?>?m=include&c=ajax_pin&a=dogetpin" title="<?php echo $_M['word']['memberTip1'];?>" id='getcode' align="absmiddle" role="button">
        </div>
    </div>
</div>
<?php } ?>
			<?php
					break;
			}
			if(count($_M['paralist'])){
			?>
			<div class="form-group m-y-30 text-muted met-more">
				<hr />
				<span class='text-xs-center w-100 bg-white'><?php echo $_M['word']['memberMoreInfo'];?></span>
			</div>
			<?php
			}
            $_M['paraclass']->parawebtem($_M['user']['id'],10,1,0,$data['class1'],$data['class2'],$data['class3']);
			?>
			<button class="btn btn-lg btn-primary btn-squared btn-block" type="submit"><?php echo $_M['word']['memberRegister'];?></button>
			<div class="login_link m-t-10 text-xs-right"><a href="<?php echo $_M['url']['login'];?>"><?php echo $_M['word']['acchave'];?></a></div>
		</form>
	</div>
</div>
<?php
# MetInfo Enterprise Content Management System
# Copyright (C) MetInfo Co.,Ltd (http://www.metinfo.cn). All rights reserved.
defined('IN_MET') or exit('No permission');
?>
<script>
var MET=[];
MET['url']=[];
MET['langtxt'] = {
	"jsx15":"<?php echo $_M['word']['jsx15'];?>",
	"js35":"<?php echo $_M['word']['js35'];?>",
	"jsx17":"<?php echo $_M['word']['jsx17'];?>",
	"formerror1":"<?php echo $_M['word']['formerror1'];?>",
	"formerror2":"<?php echo $_M['word']['formerror2'];?>",
	"formerror3":"<?php echo $_M['word']['formerror3'];?>",
	"formerror4":"<?php echo $_M['word']['formerror4'];?>",
	"formerror5":"<?php echo $_M['word']['formerror5'];?>",
	"formerror6":"<?php echo $_M['word']['formerror6'];?>",
	"formerror7":"<?php echo $_M['word']['formerror7'];?>",
	"formerror8":"<?php echo $_M['word']['formerror8'];?>",
	"js46":"<?php echo $_M['word']['js46'];?>",
	"js23":"<?php echo $_M['word']['js23'];?>",
	"checkupdatetips":"<?php echo $_M['word']['checkupdatetips'];?>",
	"detection":"<?php echo $_M['word']['detection'];?>",
	"try_again":"<?php echo $_M['word']['try_again'];?>",
	"fileOK":"<?php echo $_M['word']['fileOK'];?>",
};
MET['met_editor']="<?php echo $_M['config']['met_editor'];?>";
MET['met_keywords']="<?php echo $_M['config']['met_keywords'];?>";
MET['url']['ui']="<?php echo $_M['url']['ui'];?>";
MET['url']['own']="<?php echo $_M['url']['own'];?>";
MET['url']['own_tem']="<?php echo $_M['url']['own_tem'];?>";
MET['url']['api']="<?php echo $_M['url']['api'];?>";
</script>
<footer class='met-foot-info p-y-20 border-top1' m-id='met_foot' m-type="foot">
    <div class="met-footnav text-xs-center p-b-20" m-id='noset' m-type='foot_nav'>
    <div class="container">
        <div class="row mob-masonry">
            <?php
    $type=strtolower(trim('foot'));
    $cid=0;
    $column = load::sys_class('label', 'new')->get('column');

    unset($result);
    switch ($type) {
            case 'son':
                $result = $column->get_column_son($cid);
                break;
            case 'current':
                $result[0] = $column->get_column_id($cid);
                break;
            case 'head':
                $result = $column->get_column_head();
                break;
            case 'foot':
                $result = $column->get_column_foot();
                break;
            default:
                $result[0] = $column->get_column_id($cid);
                break;
        }
    $sub = count($result);
    foreach($result as $index=>$m):
        $hides = 1;
        $hide = explode("|",$hides);
        $m['_index']= $index;
        if($data['classnow']==$m['id'] || $data['class1']==$m['id'] || $data['class2']==$m['id'] || $data['releclass'] == $m['id']){
            $m['class']="";
        }else{
            $m['class'] = '';
        }
        if(in_array($m['name'],$hide)){
            unset($m['id']);
            $m['hide'] = $hide;
            $m['sub'] = 0;
        }


        if(substr(trim($m['icon']),0,1) == 'm' || substr(trim($m['icon']),0,1) == ''){
            $m['icon'] = 'icon fa-pencil-square-o '.$m['icon'];
        }
        $m['urlnew'] = $m['new_windows'] ? "target='_blank'" :"target='_self'";
        $m['urlnew'] = $m['nofollow'] ? $m['urlnew']." rel='nofollow'" :$m['urlnew'];
        $m['_first']=$index==0 ? true:false;
        $m['_last']=$index==(count($result)-1)?true:false;
        $$m = $m;
?>
                <?php if($m['_index']<4){ ?>
            <div class="col-lg-2 col-md-3 col-xs-6 list masonry-item foot-nav">
                <h4 class='font-size-16 m-t-0'>
                    <a href="<?php echo $m['url'];?>" <?php echo $m['urlnew'];?>  title="<?php echo $m['name'];?>"><?php echo $m['name'];?></a>
                </h4>
                    <?php if($m['sub']){ ?>
                <ul class='ulstyle m-b-0'>
                    <?php
    $type=strtolower(trim('son'));
    $cid=$m['id'];
    $column = load::sys_class('label', 'new')->get('column');

    unset($result);
    switch ($type) {
            case 'son':
                $result = $column->get_column_son($cid);
                break;
            case 'current':
                $result[0] = $column->get_column_id($cid);
                break;
            case 'head':
                $result = $column->get_column_head();
                break;
            case 'foot':
                $result = $column->get_column_foot();
                break;
            default:
                $result[0] = $column->get_column_id($cid);
                break;
        }
    $sub = count($result);
    foreach($result as $index=>$m):
        $hides = 1;
        $hide = explode("|",$hides);
        $m['_index']= $index;
        if($data['classnow']==$m['id'] || $data['class1']==$m['id'] || $data['class2']==$m['id'] || $data['releclass'] == $m['id']){
            $m['class']="";
        }else{
            $m['class'] = '';
        }
        if(in_array($m['name'],$hide)){
            unset($m['id']);
            $m['hide'] = $hide;
            $m['sub'] = 0;
        }


        if(substr(trim($m['icon']),0,1) == 'm' || substr(trim($m['icon']),0,1) == ''){
            $m['icon'] = 'icon fa-pencil-square-o '.$m['icon'];
        }
        $m['urlnew'] = $m['new_windows'] ? "target='_blank'" :"target='_self'";
        $m['urlnew'] = $m['nofollow'] ? $m['urlnew']." rel='nofollow'" :$m['urlnew'];
        $m['_first']=$index==0 ? true:false;
        $m['_last']=$index==(count($result)-1)?true:false;
        $$m = $m;
?>
                    <li>
                        <a href="<?php echo $m['url'];?>" <?php echo $m['urlnew'];?> title="<?php echo $m['name'];?>"><?php echo $m['name'];?></a>
                    </li>
                    <?php endforeach;?>
                </ul>
                <?php } ?>
            </div>
            <?php } ?>
            <?php endforeach;?>
            <div class="col-lg-3 col-md-12 col-xs-12 info masonry-item font-size-20" m-id='met_contact' m-type="nocontent">
                    <?php if($lang['footinfo_tel']){ ?>
                <p class='font-size-26'><a href="tel:<?php echo $lang['footinfo_tel'];?>" title=""><?php echo $lang['footinfo_tel'];?></a></p>
                <?php } ?>
                    <?php if($lang['footinfo_dsc']){ ?>
                <p><?php echo $lang['footinfo_dsc'];?></p>
                <?php } ?>
                    <?php if($lang['footinfo_wx_ok']){ ?>
                <a class="p-r-5" id="met-weixin" data-plugin="webuiPopover" data-trigger="hover" data-animation="pop" data-placement='top' data-width='155' data-padding='0' data-content="<div class='text-xs-center'>
                    <img src='<?php echo $lang['footinfo_wx'];?>' alt='<?php echo $c['met_webname'];?>' width='150' height='150' id='met-weixin-img'></div>
                ">
                    <i class="fa fa-weixin light-green-700"></i>
                </a>
                <?php } ?>
                    <?php if($lang['footinfo_qq_ok']){ ?>
                <a
                    <?php if($lang['foot_info_qqtype']==1){ ?>
                href="http://wpa.qq.com/msgrd?v=3&uin=<?php echo $lang['footinfo_qq'];?>&site=qq&menu=yes"
                <?php }else{ ?>
                href="http://crm2.qq.com/page/portalpage/wpa.php?uin={<?php echo $lang['footinfo_qq'];?>&aty=0&a=0&curl=&ty=1"
                <?php } ?>
                rel="nofollow" target="_blank" class="p-r-5">
                    <i class="fa fa-qq"></i>
                </a>
                <?php } ?>
                    <?php if($lang['footinfo_sina_ok']){ ?>
                <a href="<?php echo $lang['footinfo_sina'];?>" rel="nofollow" target="_blank" class="p-r-5">
                    <i class="fa fa-weibo red-600"></i>
                </a>
                <?php } ?>
                    <?php if($lang['footinfo_twitterok']){ ?>
                <a href="<?php echo $lang['footinfo_twitter'];?>" rel="nofollow" target="_blank" class="p-r-5">
                    <i class="fa fa-twitter red-600"></i>
                </a>
                <?php } ?>
                    <?php if($lang['footinfo_googleok']){ ?>
                <a href="<?php echo $lang['footinfo_google'];?>" rel="nofollow" target="_blank" class="p-r-5">
                    <i class="fa fa-google red-600"></i>
                </a>
                <?php } ?>
                    <?php if($lang['footinfo_facebookok']){ ?>
                <a href="<?php echo $lang['footinfo_facebook'];?>" rel="nofollow" target="_blank" class="p-r-5">
                    <i class="fa fa-facebook red-600"></i>
                </a>
                <?php } ?>
                    <?php if($lang['footinfo_emailok']){ ?>
                <a href="mailto:<?php echo $lang['footinfo_email'];?>" rel="nofollow" target="_blank" class="p-r-5">
                    <i class="fa fa-envelope red-600"></i>
                </a>
                <?php } ?>
            </div>
        </div>
    </div>
</div>
        <?php if($lang['link_ok'] && $data['classnow']==10001){ ?>
    <?php
    $result = load::sys_class('label', 'new')->get('link')->get_link_list();
    $sub = count($result);
     foreach($result as $index=>$v):
        $v['sub']      = $sub;
        $v['_index']   = $index;
        $v['_first']   = $index == 0 ? true:false;
        $v['_last']    = $index == (count($result)-1) ? true : false;
        $v['nofollow'] = $v['nofollow'] ? "rel='nofollow'" : '';
?><?php endforeach;?>
        <?php if($sub){ ?>
    <div class="met-link border-top1 text-xs-center p-y-10" m-id='noset' m-type='link'>
        <div class="container">
            <ul class="breadcrumb p-0 link-img m-0">
                <li class='breadcrumb-item'><?php echo $lang['footlink_title'];?> :</li>
                <?php
    $result = load::sys_class('label', 'new')->get('link')->get_link_list();
    $sub = count($result);
     foreach($result as $index=>$v):
        $v['sub']      = $sub;
        $v['_index']   = $index;
        $v['_first']   = $index == 0 ? true:false;
        $v['_last']    = $index == (count($result)-1) ? true : false;
        $v['nofollow'] = $v['nofollow'] ? "rel='nofollow'" : '';
?>
                <li class='breadcrumb-item'>
                    <a href="<?php echo $v['weburl'];?>" title="<?php echo $v['webname'];?>" target="_blank">
                        <?php if($v['link_type']==1){ ?>
                        <img data-original="<?php echo $v['weblogo'];?>" alt="<?php echo $v['webname'];?>" height='40'>
                    <?php }else{ ?>
                        <span><?php echo $v['webname'];?></span>
                    <?php } ?>
                    </a>
                </li>
                <?php endforeach;?>
            </ul>
        </div>
    </div>
    <?php } ?>
    <?php } ?>
    <div class="copy p-y-10 border-top1">
        <div class="container text-xs-center">
                <?php if($c['met_footright'] || $c['met_footstat']){ ?>
            <div><?php echo $c['met_footright'];?></div>
            <?php } ?>
                <?php if($c['met_footaddress']){ ?>
            <div><?php echo $c['met_footaddress'];?></div>
            <?php } ?>
                <?php if($c['met_foottel']){ ?>
            <div><?php echo $c['met_foottel'];?></div>
            <?php } ?>
                <?php if($c['met_footother']){ ?>
            <div><?php echo $c['met_footother'];?></div>
            <?php } ?>
            <div class="powered_by_metinfo"><?php echo $c['met_agents_copyright_foot'];?></div>
                    <?php if($c['met_ch_lang'] && $lang['cn1_position']==0){ ?>
                        <?php if($lang['cn1_ok']){ ?>
                        <?php if($data[lang]==cn || $data[lang]==zh){ ?>
                        <button type="button" class="btn btn-outline btn-default btn-squared btn-lang" id='btn-convert' m-id="lang" m-type="lang">繁体</button>
                    <?php } ?>
                    <?php } ?>
                <?php } ?>
                    <?php if($c['met_lang_mark'] && $lang['langlist_position']==0){ ?>
                <div class="met-langlist vertical-align" m-id="lang"  m-type="lang">
                    <div class="inline-block dropup">
                        <?php
    $language = load::sys_class('label', 'new')->get('language')->get_lang();
    $sub = count($language);
    $i = 0;
    foreach($language as $index=>$v):

        $v['_index']   = $index;
        $v['_first']   = $i == 0 ? true:false;

        $v['_last']    = $index == (count($language)-1) ? true : false;
        $v['sub'] = $sub;
        $i++;
?><?php endforeach;?>
                            <?php if($sub>1){ ?>
                        <?php
    $language = load::sys_class('label', 'new')->get('language')->get_lang();
    $sub = count($language);
    $i = 0;
    foreach($language as $index=>$v):

        $v['_index']   = $index;
        $v['_first']   = $i == 0 ? true:false;

        $v['_last']    = $index == (count($language)-1) ? true : false;
        $v['sub'] = $sub;
        $i++;
?>
                            <?php if($data['lang']==$v['mark']){ ?>
                        <button type="button" data-toggle="dropdown" class="btn btn-outline btn-default btn-squared dropdown-toggle btn-lang">
                                <?php if($lang['langlist1_icon_ok']){ ?>
                            <img src="<?php echo $v['flag'];?>" alt="<?php echo $v['name'];?>" width="20">
                            <?php } ?>
                            <span><?php echo $v['name'];?></span>
                        </button>
                        <?php } ?>
                        <?php endforeach;?>
                        <ul class="dropdown-menu dropdown-menu-right animate animate-reverse" id="met-langlist-dropdown" role="menu">
                            <?php
    $language = load::sys_class('label', 'new')->get('language')->get_lang();
    $sub = count($language);
    $i = 0;
    foreach($language as $index=>$v):

        $v['_index']   = $index;
        $v['_first']   = $i == 0 ? true:false;

        $v['_last']    = $index == (count($language)-1) ? true : false;
        $v['sub'] = $sub;
        $i++;
?>
                            <a href="<?php echo $v['met_weburl'];?>" title="<?php echo $v['name'];?>" class='dropdown-item'     <?php if($v[newwindows]==1){ ?>target="_blank"<?php } ?>>
                                    <?php if($lang['langlist1_icon_ok']){ ?>
                                <img src="<?php echo $v['flag'];?>" alt="<?php echo $v['name'];?>" width="20">
                                <?php } ?>
                                <?php echo $v['name'];?>
                            </a>
                            <?php endforeach;?>
                        </ul>
                        <?php } ?>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>
</footer>

<?php
if($lang_json_file_ok){
    if($metinfover_v2){
        if(is_file(PATH_TEM."cache/common.js")){
            $common_js_time = filemtime(PATH_TEM."cache/common.js");
            $metpagejs="common.js?".$common_js_time;
        }
        if($met_page){
            $page_js_time = filemtime(PATH_TEM."cache/".$met_page."_".$_M["lang"].".js");
            $metpagejs=$met_page."_".$_M["lang"].".js?".$page_js_time;
        }
    }
?>
<input type="hidden" name="met_lazyloadbg" value="<?php echo $g['lazyloadbg'];?>">
<?php if($c["shopv2_open"]){ ?>
<script>
var jsonurl="<?php echo $url['shop_cart_jsonlist'];?>",
    totalurl="<?php echo $url['shop_cart_modify'];?>",
    delurl="<?php echo $url['shop_cart_del'];?>",
    price_prefix="<?php echo $c['shopv2_price_str_prefix'];?>",
    price_suffix="<?php echo $c['shopv2_price_str_suffix'];?>";
</script>
<?php
    }
}
$basic_js_name=$metinfover_v2?"":"_web";
if($c["temp_frame_version"]=="v2") $basic_js_name.="_v2";
$basic_js_time = filemtime(PATH_WEB."public/ui/v2/static/js/basic".$basic_js_name.".js");
?>
<script src="<?php echo $c['met_weburl'];?>public/ui/v2/static/js/basic<?php echo $basic_js_name;?>.js?<?php echo $basic_js_time;?>" data-js_url="<?php echo $c['met_weburl'];?>templates/<?php echo $c['met_skin_user'];?>/cache/<?php echo $metpagejs;?>" id="met-page-js"></script>
<?php
if($lang_json_file_ok){
    $met_lang_time = filemtime(PATH_WEB."cache/lang_json_".$data["lang"].".js");
?>
<script src="<?php echo $c['met_weburl'];?>cache/lang_json_<?php echo $data['lang'];?>.js?<?php echo $met_lang_time;?>"></script>
<?php
    if($c["shopv2_open"]){
        $shop_js_filemtime = filemtime(PATH_ALL_APP."shop/web/templates/met/js/own.js");
        if(($metinfover_v2=="v2" && $template_type) || $metinfover_v2!="v2"){
            $app_js_filemtime = filemtime(PATH_WEB."public/ui/v2/static/js/app.js");
?>
<script src="<?php echo $url['site'];?>public/ui/v2/static/js/app.js?<?php echo $app_js_filemtime;?>"></script>
<?php } ?>
<script src="<?php echo $url['shop_ui'];?>js/own.js?<?php echo $shop_js_filemtime;?>"></script>
<?php
    }
    if(is_mobile() && $c["met_footstat_mobile"]){
?>
<?php echo $c['met_footstat_mobile'];?>

<?php }else if(!is_mobile() && $c["met_footstat"]){?>
<?php echo $c['met_footstat'];?>

<?php
    }
    if($_M["html_plugin"]["foot_script"]){
?>
<?php echo $_M["html_plugin"]["foot_script"];?>

<?php
    }
}
?>
</body>
</html>
    <?php if(!$c['shopv2_open']){ ?>
<?php $app_js_time = filemtime(PATH_WEB.'public/ui/v2/static/js/app.js'); ?>
<script src="<?php echo $_M['url']['site'];?>public/ui/v2/static/js/app.js?<?php echo $app_js_time;?>"></script>
<?php } ?>
<?php if(file_exists(PATH_OWN_FILE."templates/met/js/own.js") && !((M_NAME=='product' || M_NAME=='shop') && $_M['config']['shopv2_open'])){
	$own_js_time = filemtime(PATH_OWN_FILE.'templates/met/js/own.js');
?>
<script src="<?php echo $_M['url']['own_tem'];?>js/own.js?<?php echo $own_js_time;?>"></script><?php } ?>