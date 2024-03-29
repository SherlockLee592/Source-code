<?php defined('IN_MET') or exit('No permission'); ?>
<main class="$uicss met-download" m-id='{$ui.mid}'>
    <div class="container">
        <div class="row">
        <tag action='job.list' num="$c['met_job_list']">
			<div class="card card-shadow">
				<h4 class='card-title p-0 font-size-24'>{$v.position}</h4>
				<p class="card-metas font-size-12 blue-grey-400">
					<span class='m-r-10'>{$v.addtime}</span>
					<span class='m-r-10'>
						<i class="icon wb-map m-r-5" aria-hidden="true"></i>
						{$v.place}
					</span>
					<span class='m-r-10'>
						<i class="icon wb-user m-r-5" aria-hidden="true"></i>
						{$v.count}
					</span>
					<span>
						<i class="icon wb-payment m-r-5" aria-hidden="true"></i>
						{$v.deal}
					</span>
				</p>
				<hr>
				<div class="met-editor clearfix">
					{$v.content}
				</div>
				<hr>
				<div class="card-body-footer m-t-0">
					<a class="btn btn-outline btn-squared btn-primary met-job-cvbtn" href="javascript:;" data-toggle="modal" data-target="#met-job-cv" data-jobid="{$v.id}" data-cvurl="cv.php?lang=cn&selected">{$ui.cvtitle}</a>
				</div>
			</div>
		</tag>
		</div>
	</div>
</main>