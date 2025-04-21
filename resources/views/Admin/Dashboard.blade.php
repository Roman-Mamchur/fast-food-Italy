@include('Admin.Base.Header')
<style>
	img {
    height: auto;
    max-width: 100%;
    object-fit: scale-down;
	}
</style>
	<body id="sherah-dark-light">
		<div class="sherah-body-area">
            @include('Admin.Base.Sidebar')
			@include('Admin.Base.Navbar')

			<section class="sherah-adashboard sherah-show">
				<div class="container">
					<div class="row">
						<div class="col-12 sherah-main__column">
							<div class="sherah-body">
								<!-- Dashboard Inner -->
								<div class="sherah-dsinner">
									<div class="row mg-top-10">
										<div class="col-lg-3 col-md-6 col-12">
											<!-- Progress Card -->
											<div class="sherah-progress-card sherah-border sherah-default-bg mg-top-30">
												<div class="sherah-progress-card__icon sherah-default-bg sherah-border">
                                                    <svg width="38" height="38" viewBox="0 0 38 38" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M20.7207 5.5H19.5625C19.2641 5.5 18.978 5.61853 18.767 5.82951C18.556 6.04048 18.4375 6.32663 18.4375 6.625C18.4375 6.92337 18.556 7.20952 18.767 7.42049C18.978 7.63147 19.2641 7.75 19.5625 7.75H19.5957C19.8941 7.75 20.1802 7.86853 20.3912 8.07951C20.6022 8.29048 20.7207 8.57663 20.7207 8.875C20.7207 9.17337 20.6022 9.45952 20.3912 9.67049C20.1802 9.88147 19.8941 10 19.5957 10H18.4375" stroke="#F01543" stroke-width="1.3" stroke-linecap="round" stroke-linejoin="round"/>
                                                        <path d="M19.5625 5.5V4.375" stroke="#F01543" stroke-width="1.3" stroke-linecap="round" stroke-linejoin="round"/>
                                                        <path d="M19.5625 11.125V10" stroke="#F01543" stroke-width="1.3" stroke-linecap="round" stroke-linejoin="round"/>
                                                        <path d="M10.5625 13.375H7.75V1.5625H31.375V7.75" stroke="#F01543" stroke-width="1.3" stroke-linecap="round" stroke-linejoin="round"/>
                                                        <path d="M11.125 3.8125C11.125 4.11087 11.0065 4.39702 10.7955 4.608C10.5845 4.81897 10.2984 4.9375 10 4.9375" stroke="#F01543" stroke-width="1.3" stroke-linecap="round" stroke-linejoin="round"/>
                                                        <path d="M28 3.8125C28 4.11087 28.1185 4.39702 28.3295 4.608C28.5405 4.81897 28.8266 4.9375 29.125 4.9375" stroke="#F01543" stroke-width="1.3" stroke-linecap="round" stroke-linejoin="round"/>
                                                        <path d="M10 10C10.2984 10 10.5845 10.1185 10.7955 10.3295C11.0065 10.5405 11.125 10.8266 11.125 11.125" stroke="#F01543" stroke-width="1.3" stroke-linecap="round" stroke-linejoin="round"/>
                                                        <path d="M10 30.8125H12.8125" stroke="#F01543" stroke-width="1.3" stroke-linecap="round" stroke-linejoin="round"/>
                                                        <path d="M6.625 36.4375L8.52006 34.75H20.2937C20.8583 34.75 21.4022 34.5378 21.8176 34.1554L24.6301 31.5679C24.8123 31.3858 24.9556 31.1683 25.051 30.929C25.1465 30.6896 25.1922 30.4333 25.1853 30.1757C25.1784 29.918 25.119 29.6645 25.0109 29.4306C24.9028 29.1967 24.7481 28.9872 24.5564 28.8151C24.1737 28.4947 23.6837 28.3316 23.1854 28.3587C22.6871 28.3859 22.2177 28.6013 21.8721 28.9613L19.6024 30.8125H13.375C13.8226 30.8125 14.2518 30.6347 14.5682 30.3182C14.8847 30.0018 15.0625 29.5726 15.0625 29.125C15.0625 28.6774 14.8847 28.2482 14.5682 27.9318C14.2518 27.6153 13.8226 27.4375 13.375 27.4375H6.30944C5.71275 27.4376 5.14055 27.6748 4.71869 28.0968L1.5625 31.2524" stroke="#F01543" stroke-width="1.3" stroke-linecap="round" stroke-linejoin="round"/>
                                                        <path d="M19.5625 25.1875V24.625C19.5625 22.984 18.9106 21.4102 17.7502 20.2498C16.5898 19.0894 15.016 18.4375 13.375 18.4375C11.734 18.4375 10.1602 19.0894 8.99978 20.2498C7.8394 21.4102 7.1875 22.984 7.1875 24.625V25.1875" stroke="#F01543" stroke-width="1.3" stroke-linecap="round" stroke-linejoin="round"/>
                                                        <path d="M5.5 25.1875H21.25" stroke="#F01543" stroke-width="1.3" stroke-linecap="round" stroke-linejoin="round"/>
                                                        <path d="M13.375 18.4375V17.3125" stroke="#F01543" stroke-width="1.3" stroke-linecap="round" stroke-linejoin="round"/>
                                                        <path d="M28 13.375H25.1875" stroke="#F01543" stroke-width="1.3" stroke-linecap="round" stroke-linejoin="round"/>
                                                        <path d="M31.3754 19L29.4803 17.3125H17.7066C17.1421 17.3125 16.5982 17.1003 16.1828 16.7179L13.3703 14.1304C13.1881 13.9483 13.0448 13.7308 12.9494 13.4915C12.8539 13.2521 12.8082 12.9958 12.8151 12.7382C12.822 12.4805 12.8813 12.227 12.9895 11.9931C13.0976 11.7592 13.2523 11.5497 13.444 11.3776C13.8267 11.0572 14.3167 10.8941 14.815 10.9212C15.3133 10.9484 15.7827 11.1638 16.1283 11.5238L18.398 13.375H24.6254C24.1778 13.375 23.7486 13.1972 23.4321 12.8807C23.1157 12.5643 22.9379 12.1351 22.9379 11.6875C22.9379 11.2399 23.1157 10.8107 23.4321 10.4943C23.7486 10.1778 24.1778 10 24.6254 10H31.691C32.2876 10.0001 32.8598 10.2373 33.2817 10.6593L36.4379 13.8149" stroke="#F01543" stroke-width="1.3" stroke-linecap="round" stroke-linejoin="round"/>
                                                    </svg>

                                                </div>
												<div class="sherah-progress-card__content">
													<div class="sherah-progress-card__heading">
														<span class="sherah-pcolor">Total Sales</span>
														<h4 class="sherah-progress-card__title"><b class="count-animate">{{ $setting->currency_icon }}{{$totalSales}}</b></h4>
													</div>
													<div class="sherah-progress-card__button">
														<p class="sherah-progress-card__text sherah-color3">

														</p>
													</div>

												</div>
											</div>
											<!-- End Progress Card -->
										</div>
										<div class="col-lg-3 col-md-6 col-12">
											<!-- Progress Card -->
											<div class="sherah-progress-card sherah-border sherah-default-bg mg-top-30">
												<div class="sherah-progress-card__icon sherah-default-bg sherah-border">
                                                    <svg width="29" height="36" viewBox="0 0 29 36" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M24.7797 5.27336H21.5808V3.84228C21.5808 3.37927 21.0758 3.16883 20.6127 3.16883H18.1294C17.5401 1.48518 16.0669 0.64335 14.3833 0.64335C12.7182 0.580751 11.2036 1.60175 10.6372 3.16883H8.19587C7.73286 3.16883 7.26985 3.37927 7.26985 3.84228V5.27336H4.07084C2.17514 5.29358 0.624261 6.78903 0.535156 8.68272V32.801C0.535156 34.653 2.21881 35.9999 4.07084 35.9999H24.7797C26.6318 35.9999 28.3154 34.653 28.3154 32.801V8.6828C28.2263 6.78903 26.6754 5.29358 24.7797 5.27336ZM8.95342 4.85248H11.2685C11.6726 4.80318 11.9972 4.49574 12.0682 4.09485C12.3175 3.00931 13.2699 2.23008 14.3833 2.20076C15.4864 2.23419 16.4244 3.01584 16.6562 4.09485C16.7317 4.5096 17.0777 4.82098 17.498 4.85248H19.8972V8.21979H8.95342V4.85248ZM26.6318 32.8011C26.6318 33.7271 25.7058 34.3163 24.7797 34.3163H4.07084C3.14483 34.3163 2.21881 33.7271 2.21881 32.8011V8.6828C2.30469 7.71891 3.10325 6.97473 4.07084 6.95709H7.26977V9.10375C7.31424 9.57538 7.72271 9.92818 8.19579 9.90352H20.6127C21.0944 9.92987 21.5157 9.58191 21.5807 9.10375V6.95701H24.7797C25.7472 6.97473 26.5458 7.71883 26.6317 8.68272V32.8011H26.6318Z" fill="#F01543"/>
                                                        <path d="M11.184 19.4578C10.8682 19.1249 10.3441 19.1062 10.0054 19.4157L7.31153 21.9832L6.17508 20.8047C5.85934 20.4718 5.33519 20.4531 4.99649 20.7626C4.67044 21.1042 4.67044 21.6416 4.99649 21.9832L6.7222 23.7511C6.87157 23.9183 7.08732 24.0108 7.31145 24.0037C7.53349 24.0005 7.7453 23.9097 7.90071 23.7511L11.1838 20.6363C11.5093 20.3378 11.5311 19.8318 11.2324 19.5064C11.2171 19.4894 11.2009 19.4732 11.184 19.4578Z" fill="#F01543"/>
                                                        <path d="M23.265 21.2695H13.584C13.1191 21.2695 12.7422 21.6464 12.7422 22.1114C12.7422 22.5763 13.1191 22.9532 13.584 22.9532H23.265C23.7299 22.9532 24.1068 22.5763 24.1068 22.1114C24.1068 21.6464 23.7299 21.2695 23.265 21.2695Z" fill="#F01543"/>
                                                        <path d="M11.184 12.7234C10.8682 12.3906 10.3441 12.3718 10.0054 12.6813L7.31153 15.2489L6.17508 14.0703C5.85934 13.7375 5.33519 13.7187 4.99649 14.0282C4.67044 14.3698 4.67044 14.9073 4.99649 15.2489L6.7222 17.0167C6.87157 17.184 7.08732 17.2765 7.31145 17.2693C7.53349 17.2661 7.7453 17.1753 7.90071 17.0167L11.1838 13.902C11.5093 13.6034 11.5311 13.0974 11.2324 12.772C11.2171 12.755 11.2009 12.7389 11.184 12.7234Z" fill="#F01543"/>
                                                        <path d="M23.265 14.5352H13.584C13.1191 14.5352 12.7422 14.912 12.7422 15.377C12.7422 15.8419 13.1191 16.2188 13.584 16.2188H23.265C23.7299 16.2188 24.1068 15.8419 24.1068 15.377C24.1068 14.912 23.7299 14.5352 23.265 14.5352Z" fill="#F01543"/>
                                                        <path d="M11.184 26.1921C10.8682 25.8593 10.3441 25.8406 10.0054 26.15L7.31153 28.7176L6.17508 27.539C5.85934 27.2062 5.33519 27.1875 4.99649 27.4969C4.67044 27.8385 4.67044 28.376 4.99649 28.7176L6.7222 30.4854C6.87157 30.6527 7.08732 30.7452 7.31145 30.738C7.53349 30.7349 7.7453 30.6441 7.90071 30.4854L11.1838 27.3707C11.5093 27.0721 11.5311 26.5662 11.2324 26.2408C11.2171 26.2238 11.2009 26.2077 11.184 26.1921Z" fill="#F01543"/>
                                                        <path d="M23.265 28.0039H13.584C13.1191 28.0039 12.7422 28.3808 12.7422 28.8457C12.7422 29.3107 13.1191 29.6876 13.584 29.6876H23.265C23.7299 29.6876 24.1068 29.3107 24.1068 28.8457C24.1068 28.3808 23.7299 28.0039 23.265 28.0039Z" fill="#F01543"/>
                                                    </svg>

                                                </div>
												<div class="sherah-progress-card__content">
													<div class="sherah-progress-card__heading">
														<span class="sherah-pcolor">Total Orders</span>
														<h4 class="sherah-progress-card__title"><b class="count-animate">{{$totalOrder}}</b></h4>
													</div>
													<div class="sherah-progress-card__button">
														<p class="sherah-progress-card__text sherah-color2">

														</p>
														{{-- <a href="#" class="sherah-see-all">View all orders</a> --}}
													</div>

												</div>
											</div>
											<!-- End Progress Card -->
										</div>
										<div class="col-lg-3 col-md-6 col-12">
											<!-- Progress Card -->
											<div class="sherah-progress-card sherah-border sherah-default-bg mg-top-30">
												<div class="sherah-progress-card__icon sherah-default-bg sherah-border">
                                                    <svg width="36" height="36" viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M31.7561 13.738C32.8125 13.0224 33.5082 11.8133 33.5082 10.444C33.5082 8.25173 31.7243 6.46842 29.5326 6.46842V0.789062H0V24.6423H8.26687C8.66101 25.3182 9.3857 25.7782 10.2228 25.7782V31.7415C10.2228 32.8377 11.1145 33.7293 12.2106 33.7293C12.7672 33.7293 13.2692 33.4982 13.6304 33.1284C13.9917 33.4982 14.4937 33.7293 15.0503 33.7293C16.1464 33.7293 17.0381 32.8377 17.0381 31.7415V26.5983C17.3737 26.7937 17.7582 26.9141 18.1739 26.9141V34.0133C18.1739 35.1094 19.0656 36.001 20.1617 36.001C20.7183 36.001 21.2203 35.7699 21.5815 35.4002C21.9427 35.7699 22.4448 36.001 23.0014 36.001C24.0975 36.001 24.9892 35.1094 24.9892 34.0133V26.9141C25.4049 26.9141 25.7894 26.7937 26.125 26.5983V31.7415C26.125 32.8377 27.0167 33.7293 28.1128 33.7293C28.6694 33.7293 29.1714 33.4982 29.5326 33.1284C29.8938 33.4982 30.3959 33.7293 30.9525 33.7293C32.0486 33.7293 32.9402 32.8377 32.9402 31.7415V25.7782C34.1931 25.7782 35.212 24.7593 35.212 23.5065V18.963C35.212 16.6203 33.7853 14.6047 31.7561 13.738ZM32.3723 10.444C32.3723 12.0098 31.0984 13.2836 29.5326 13.2836C27.9668 13.2836 26.693 12.0098 26.693 10.444C26.693 8.87817 27.9668 7.60429 29.5326 7.60429C31.0984 7.60429 32.3723 8.87817 32.3723 10.444ZM28.3968 1.92493V5.33254H1.13587V1.92493H28.3968ZM1.13587 23.5065V6.46842H13.6304H28.3968V6.63596C26.7571 7.12608 25.5571 8.64702 25.5571 10.444C25.5571 11.815 26.2551 13.0264 27.3137 13.7408C26.1091 14.2548 25.0999 15.1766 24.4865 16.3636C24.2673 16.2324 24.0418 16.1108 23.805 16.0097C24.8614 15.2941 25.5571 14.085 25.5571 12.7157C25.5571 10.5235 23.7732 8.74016 21.5815 8.74016C19.3899 8.74016 17.606 10.5235 17.606 12.7157C17.606 14.085 18.3017 15.2941 19.3581 16.0097C19.1212 16.1108 18.8958 16.2324 18.6766 16.3636C18.0637 15.1771 17.054 14.2548 15.8494 13.7408C16.908 13.0264 17.606 11.815 17.606 10.444C17.606 8.25173 15.8221 6.46842 13.6304 6.46842C11.4388 6.46842 9.6549 8.25173 9.6549 10.444C9.6549 11.8133 10.3506 13.0224 11.407 13.738C9.37775 14.6047 7.95109 16.6203 7.95109 18.963V23.5065H1.13587ZM18.7419 12.7157C18.7419 11.1499 20.0157 9.87603 21.5815 9.87603C23.1473 9.87603 24.4212 11.1499 24.4212 12.7157C24.4212 14.2815 23.1473 15.5554 21.5815 15.5554C20.0157 15.5554 18.7419 14.2815 18.7419 12.7157ZM10.7908 10.444C10.7908 8.87817 12.0646 7.60429 13.6304 7.60429C15.1962 7.60429 16.4701 8.87817 16.4701 10.444C16.4701 12.0098 15.1962 13.2836 13.6304 13.2836C12.0646 13.2836 10.7908 12.0098 10.7908 10.444ZM15.9022 31.7415C15.9022 32.2112 15.52 32.5934 15.0503 32.5934C14.5806 32.5934 14.1984 32.2112 14.1984 31.7415V22.3706H13.0625V31.7415C13.0625 32.2112 12.6803 32.5934 12.2106 32.5934C11.7409 32.5934 11.3587 32.2112 11.3587 31.7415V18.3951H10.2228V24.6423C9.5964 24.6423 9.08696 24.1329 9.08696 23.5065V18.963C9.08696 16.4578 11.1253 14.4195 13.6304 14.4195C15.4047 14.4195 17.0057 15.4713 17.7429 17.0615C16.6144 18.0997 15.9022 19.5837 15.9022 21.2347V21.8027V24.6423V31.7415ZM24.9892 25.7782V20.6668H23.8533V34.0133C23.8533 34.483 23.4711 34.8652 23.0014 34.8652C22.5317 34.8652 22.1495 34.483 22.1495 34.0133V24.6423H21.0136V34.0133C21.0136 34.483 20.6314 34.8652 20.1617 34.8652C19.692 34.8652 19.3098 34.483 19.3098 34.0133V20.6668H18.1739V25.7782C17.5475 25.7782 17.0381 25.2688 17.0381 24.6423V21.8027V21.2347C17.0381 18.7296 19.0764 16.6913 21.5815 16.6913C24.0867 16.6913 26.125 18.7296 26.125 21.2347V21.8027V24.6423C26.125 25.2688 25.6156 25.7782 24.9892 25.7782ZM34.0761 23.5065C34.0761 24.1329 33.5667 24.6423 32.9402 24.6423V18.3951H31.8044V31.7415C31.8044 32.2112 31.4222 32.5934 30.9525 32.5934C30.4828 32.5934 30.1006 32.2112 30.1006 31.7415V22.3706H28.9647V31.7415C28.9647 32.2112 28.5825 32.5934 28.1128 32.5934C27.6431 32.5934 27.2609 32.2112 27.2609 31.7415V24.6423V21.8027V21.2347C27.2609 19.5837 26.5487 18.0997 25.4202 17.0615C26.1574 15.4713 27.7584 14.4195 29.5326 14.4195C32.0378 14.4195 34.0761 16.4578 34.0761 18.963V23.5065Z" fill="#F01543"/>
                                                    </svg>

                                                </div>
												<div class="sherah-progress-card__content">
													<div class="sherah-progress-card__heading">
														<span class="sherah-pcolor">Total Customers</span>
														<h4 class="sherah-progress-card__title"><b class="count-animate">{{$totalUser}}</b></h4>
													</div>
													<div class="sherah-progress-card__button">
														<p class="sherah-progress-card__text sherah-color1">

														</p>
													</div>

												</div>
											</div>
											<!-- End Progress Card -->
										</div>
										<div class="col-lg-3 col-md-6 col-12">
											<!-- Progress Card -->
											<div class="sherah-progress-card sherah-border sherah-default-bg mg-top-30">
												<div class="sherah-progress-card__icon sherah-default-bg sherah-border">
                                                    <svg width="26" height="34" viewBox="0 0 26 34" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M2.16665 33.2498H23.8332C25.0298 33.2498 25.9998 32.2797 25.9998 31.0831V5.53234C25.9993 5.30845 25.9522 5.0871 25.8617 4.88234C25.8573 4.87097 25.8503 4.86176 25.8449 4.85039C25.766 4.67714 25.6573 4.51909 25.5237 4.38347L22.3669 1.22612C22.2307 1.09092 22.0718 0.980884 21.8973 0.901125C21.8875 0.896792 21.8794 0.890292 21.8691 0.8865C21.6639 0.796242 21.4422 0.749754 21.218 0.750001L2.16665 0.75C0.970042 0.750001 0 1.72004 0 2.91665V31.0831C0 32.2797 0.970042 33.2498 2.16665 33.2498ZM24.1506 4.54164H23.2915C22.6932 4.54164 22.2082 4.05662 22.2082 3.45831V2.59924L24.1506 4.54164ZM1.08333 2.91665C1.08333 2.31835 1.56835 1.83333 2.16665 1.83333H21.1248V3.45831C21.1248 4.65492 22.0949 5.62496 23.2915 5.62496H24.9165V31.0831C24.9165 31.6814 24.4315 32.1664 23.8332 32.1664H2.16665C1.56835 32.1664 1.08333 31.6814 1.08333 31.0831V2.91665Z" fill="#F01543"/>
                                                        <path d="M4.87499 13.2068H8.12496C9.02242 13.2068 9.74995 12.4793 9.74995 11.5818V8.55612L11.2162 7.08984C11.4215 6.8773 11.4186 6.53946 11.2096 6.33052C11.0007 6.12159 10.6629 6.11865 10.4503 6.32393L9.41683 7.35688C9.1125 6.94897 8.63388 6.70816 8.12496 6.70688H4.87499C3.97753 6.70688 3.25 7.43441 3.25 8.33187V11.5818C3.25 12.4793 3.97753 13.2068 4.87499 13.2068ZM4.33333 8.33187C4.33333 8.03272 4.57584 7.79021 4.87499 7.79021H8.12496C8.35078 7.79129 8.55192 7.93317 8.62871 8.14554L7.04164 9.73261L6.34127 9.03224C6.12873 8.82696 5.79089 8.8299 5.58196 9.03884C5.37302 9.24777 5.37008 9.58561 5.57536 9.79815L6.65868 10.8815C6.8702 11.0929 7.21307 11.0929 7.42459 10.8815L8.66663 9.63944V11.5818C8.66663 11.881 8.42412 12.1235 8.12496 12.1235H4.87499C4.57584 12.1235 4.33333 11.881 4.33333 11.5818V8.33187Z" fill="#F01543"/>
                                                        <path d="M4.87499 20.7929H8.12496C9.02242 20.7929 9.74995 20.0654 9.74995 19.1679V15.918C9.74995 15.0205 9.02242 14.293 8.12496 14.293H4.87499C3.97753 14.293 3.25 15.0205 3.25 15.918V19.1679C3.25 20.0654 3.97753 20.7929 4.87499 20.7929ZM4.33333 15.918C4.33333 15.6188 4.57584 15.3763 4.87499 15.3763H8.12496C8.42412 15.3763 8.66663 15.6188 8.66663 15.918V19.1679C8.66663 19.4671 8.42412 19.7096 8.12496 19.7096H4.87499C4.57584 19.7096 4.33333 19.4671 4.33333 19.1679V15.918Z" fill="#F01543"/>
                                                        <path d="M4.87499 28.375H8.12496C9.02242 28.375 9.74995 27.6474 9.74995 26.75V23.5C9.74995 22.6025 9.02242 21.875 8.12496 21.875H4.87499C3.97753 21.875 3.25 22.6025 3.25 23.5V26.75C3.25 27.6474 3.97753 28.375 4.87499 28.375ZM4.33333 23.5C4.33333 23.2008 4.57584 22.9583 4.87499 22.9583H8.12496C8.42412 22.9583 8.66663 23.2008 8.66663 23.5V26.75C8.66663 27.0491 8.42412 27.2916 8.12496 27.2916H4.87499C4.57584 27.2916 4.33333 27.0491 4.33333 26.75V23.5Z" fill="#F01543"/>
                                                        <path d="M13.0006 8.87629H22.2089C22.5081 8.87629 22.7506 8.63378 22.7506 8.33463C22.7506 8.03548 22.5081 7.79297 22.2089 7.79297H13.0006C12.7015 7.79297 12.459 8.03548 12.459 8.33463C12.459 8.63378 12.7015 8.87629 13.0006 8.87629Z" fill="#F01543"/>
                                                        <path d="M13.0006 11.5833H18.4173C18.7164 11.5833 18.9589 11.3408 18.9589 11.0417C18.9589 10.7425 18.7164 10.5 18.4173 10.5H13.0006C12.7015 10.5 12.459 10.7425 12.459 11.0417C12.459 11.3408 12.7015 11.5833 13.0006 11.5833Z" fill="#F01543"/>
                                                        <path d="M13.0006 16.4583H22.2089C22.5081 16.4583 22.7506 16.2158 22.7506 15.9167C22.7506 15.6175 22.5081 15.375 22.2089 15.375H13.0006C12.7015 15.375 12.459 15.6175 12.459 15.9167C12.459 16.2158 12.7015 16.4583 13.0006 16.4583Z" fill="#F01543"/>
                                                        <path d="M13.0006 19.1654H18.4173C18.7164 19.1654 18.9589 18.9228 18.9589 18.6237C18.9589 18.3245 18.7164 18.082 18.4173 18.082H13.0006C12.7015 18.082 12.459 18.3245 12.459 18.6237C12.459 18.9228 12.7015 19.1654 13.0006 19.1654Z" fill="#F01543"/>
                                                        <path d="M13.0006 24.0404H22.2089C22.5081 24.0404 22.7506 23.7978 22.7506 23.4987C22.7506 23.1995 22.5081 22.957 22.2089 22.957H13.0006C12.7015 22.957 12.459 23.1995 12.459 23.4987C12.459 23.7978 12.7015 24.0404 13.0006 24.0404Z" fill="#F01543"/>
                                                        <path d="M13.0006 26.7513H18.4173C18.7164 26.7513 18.9589 26.5088 18.9589 26.2096C18.9589 25.9105 18.7164 25.668 18.4173 25.668H13.0006C12.7015 25.668 12.459 25.9105 12.459 26.2096C12.459 26.5088 12.7015 26.7513 13.0006 26.7513Z" fill="#F01543"/>
                                                    </svg>

                                                </div>
												<div class="sherah-progress-card__content">
													<div class="sherah-progress-card__heading">
														<span class="sherah-pcolor">Total Menu Items</span>
														<h4 class="sherah-progress-card__title"><b class="count-animate">{{$totalProduct}}</b></h4>
													</div>
													<div class="sherah-progress-card__button">
														<p class="sherah-progress-card__text sherah-color4">

														</p>
													</div>
												</div>
											</div>
											<!-- End Progress Card -->
										</div>

									</div>

									<div class="row">
										<div class="col-12">
											<div class="sherah-table sherah-default-bg sherah-border mg-top-30">
												<div class="sherah-table__heading">
													<h3 class="sherah-heading__title mb-0">Recent Orders</h3>
												</div>
												<!-- sherah Table -->
												<table id="sherah-table__main" class="sherah-table__main sherah-table__main--front sherah-table__main-v1">
													<!-- sherah Table Head -->
													<thead class="sherah-table__head">
														<tr>
															<th class="sherah-table__column-1 sherah-table__h1">Order ID</th>
															<th class="sherah-table__column-2 sherah-table__h2">Type</th>
															<th class="sherah-table__column-3 sherah-table__h3">Customer Name</th>
															<th class="sherah-table__column-4 sherah-table__h4">Date</th>
															<th class="sherah-table__column-5 sherah-table__h5">Payment Status</th>
															<th class="sherah-table__column-6 sherah-table__h6">Payment Method</th>
															<th class="sherah-table__column-7 sherah-table__h7">Total</th>
															<th class="sherah-table__column-8 sherah-table__h8">Order Status</th>
														</tr>
													</thead>
													<!-- sherah Table Body -->
													<tbody class="sherah-table__body">
														@foreach ($order as $order)

															<tr>
																<td class="sherah-table__column-1 sherah-table__data-1">
																	<div class="sherah-language-form__input">

																		<p class="crany-table__product--number"><a href="{{route('order.detils',$order->id)}}" class="sherah-color1">#{{$order->id}}</a></p>
																	</div>
																</td>
																<td class="sherah-table__column-2 sherah-table__data-2">
																	<div class="sherah-table__product-content">
																		<p class="sherah-table__product-desc">{{$order->type}}</p>
																	</div>
																</td>
																<td class="sherah-table__column-3 sherah-table__data-3">
																	<div class="sherah-table__product-content">
																		<p class="sherah-table__product-desc">{{$order->userName->name}}</p>
																	</div>
																</td>
																<td class="sherah-table__column-4 sherah-table__data-4">
																	<p class="sherah-table__product-desc">{{$order->created_at->format('M d, Y h:i A')}}</p>
																</td>
																@if($order->payment_status == 'Pending')
																	<td class="sherah-table__column-5 sherah-table__data-5">
																		<div class="sherah-table__product-content">
																			<div class="sherah-table__status sherah-color2 sherah-color2__bg--opactity">Pending</div>
																		</div>
																	</td>
																@else
																	<td class="sherah-table__column-5 sherah-table__data-5">
																		<div class="sherah-table__product-content">
																			<div class="sherah-table__status sherah-color3 sherah-color3__bg--opactity">Success</div>
																		</div>
																	</td>
																@endif

																<td class="sherah-table__column-6 sherah-table__data-6">
																	<div class="sherah-table__product-content">
																		<p class="sherah-table__product-desc">{{$order->payment_method}}</p>
																	</div>
																</td>
																<td class="sherah-table__column-7 sherah-table__data-7">
																	<div class="sherah-table__product-content">
																		<p class="sherah-table__product-desc">{{ $setting->currency_icon }}{{$order->grand_total}}</p>
																	</div>
																</td>
																@if($order->order_status == 1)
																	<td class="sherah-table__column-8 sherah-table__data-8">
																		<div class="sherah-table__status sherah-color2 sherah-color2__bg--opactity">Pending</div>
																	</td>
																@endif
																@if($order->order_status == 2)
																	<td class="sherah-table__column-8 sherah-table__data-8">
																		<div class="sherah-table__status sherah-color4 sherah-color4__bg--opactity">Confirmed</div>
																	</td>
																@endif
																@if($order->order_status == 3)
																	<td class="sherah-table__column-8 sherah-table__data-8">
																		<div class="sherah-table__status sherah-color3 sherah-color3__bg--opactity">Deliverd</div>
																	</td>
																@endif
															</tr>
														   @endforeach
													</tbody>
													<!-- End sherah Table Body -->
												</table>
												<!-- End sherah Table -->
											</div>
										</div>
									</div>



								</div>
								<!-- End Dashboard Inner -->
							</div>
						</div>
					</div>
				</div>
			</section>
		</div>
@include('Admin.Base.Footer')

