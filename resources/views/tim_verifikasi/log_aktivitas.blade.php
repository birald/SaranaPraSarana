@extends('tim_verifikasi/layouts')

@section('content')


	<!-- header -->
	<header class="page-header">
		<h2>Proposal</h2>
	</header>
	<!-- end:header -->

	<!-- start: page -->
	<section class="panel">
		<div class="timeline">
			<div class="tm-body">
				<ol class="tm-items">
					<li>
						<div class="tm-info">
							<div class="tm-icon"><i class="fa fa-star"></i></div>
							<time class="tm-datetime" datetime="2013-11-22 19:13">
								<div class="tm-datetime-date">7 months ago.</div>
								<div class="tm-datetime-time">07:13 PM</div>
						</time>
						</div>
						<div class="tm-box" data-appear-animation="fadeInRight" data-appear-animation-delay="100">
							<p>
								It's awesome when we find a good solution for our projects, Porto Admin is <span class="text-primary">#awesome</span>
							</p>
							<div class="tm-meta">
								<span>
									<i class="fa fa-user"></i> By <a href="#">John Doe</a>
								</span>
								<span>
									<i class="fa fa-tag"></i> <a href="#">Porto</a>, <a href="#">Awesome</a>
								</span>
								<span>
									<i class="fa fa-comments"></i> <a href="#">5652 Comments</a>
								</span>
							</div>
						</div>
					</li>
				</ol>
			</div>
		</div>
	</section>
	<!-- end: page -->


@endsection
