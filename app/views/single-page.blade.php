@extends('layouts/master')

@section('content')
                <div class="row page-category">
                    <div class="col-sm-12 no-padding">
                        <h2 class="page-title">{{ $project['title'] }} <br /><small >Project by: <a href="#" class="author">{{ $project['author'] }}</a></small></h2>
                    </div>                
                </div>
                <div class="row">
                    <div class="post-content col-sm-8 col-md-8">
                      <div class="post-image-wrap">
                        <img class="img-responsive" src="{{ $project['thumbnail'] }}" style="min-width: 740px;">
                      </div>
                      <?php
/*
                      <div class="inline-social-links">
                        <span class="title">Help by sharing this to your friends:</span>
                        <ul class="list-inline list-unstyle">
                          <li>
                              <a href="#" class="icon facebook">facebook</a><span class="count-likes">100</span>
                          </li>
                          <li>
                              <a href="#" class="icon twitter">Twiiter</a><span class="count-likes">30</span>
                          </li>
                        </ul>
                      </div>
 */
                      ?>

                      <h3 class="page-title">Project Description</h3>
                      {{ $project['short_description'] }}
                      <?php
                      /*
                      <h3 class="page-title">How to be part of this project?</h3>
                      <ol class="list-readable">
                        <li>
                          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsum autem, tempore aut repellat suscipit beatae harum provident optio vitae et! Perferendis, repellendus. Ratione adipisci eaque, consectetur fugit voluptatem. Quis, accusamus!</p>
                        </li>
                        <li>
                          <p>Lorem ipsum dolor sit amet, <a href="#">consectetur adipisicing</a> elit. Minima, tempore rem saepe, dignissimos ut natus similique illum labore error voluptate repellat ipsam corporis perferendis explicabo nulla tenetur beatae at quidem.</p>
                        </li>
                        <li>
                          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Id doloribus blanditiis accusamus, eveniet unde, eos sequi sapiente ullam, quibusdam nostrum error. Eveniet sit cumque natus! Maiores ratione quisquam blanditiis veniam!</p>
                        </li>
                        <li>
                          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsa unde eveniet corporis asperiores totam, alias tempora consequuntur natus sequi, laudantium, sunt officiis omnis nemo quam temporibus, quas dolorum facere sit.</p>
                        </li>
                      </ol>
                      <h3 class="page-title">Minor Sponsorship (US$ 2500)</h3>
                      <ul class="list-readable">
                        <li>
                          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsum autem, tempore aut repellat suscipit beatae harum provident optio vitae et! Perferendis, repellendus. Ratione adipisci eaque, consectetur fugit voluptatem. Quis, accusamus!</p>
                        </li>
                        <li>
                          <p>Lorem ipsum dolor sit amet, <a href="#">consectetur adipisicing</a> elit. Minima, tempore rem saepe, dignissimos ut natus similique illum labore error voluptate repellat ipsam corporis perferendis explicabo nulla tenetur beatae at quidem.</p>
                        </li>
                        <li>
                          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Id doloribus blanditiis accusamus, eveniet unde, eos sequi sapiente ullam, quibusdam nostrum error. Eveniet sit cumque natus! Maiores ratione quisquam blanditiis veniam!</p>
                        </li>
                        <li>
                          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsa unde eveniet corporis asperiores totam, alias tempora consequuntur natus sequi, laudantium, sunt officiis omnis nemo quam temporibus, quas dolorum facere sit.</p>
                        </li>
                      </ul>
                      <h3 class="page-title">Major Sponsorship (US$ 2500)</h3>
                      <ul class="list-readable">
                        <li>
                          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsum autem, tempore aut repellat suscipit beatae harum provident optio vitae et! Perferendis, repellendus. Ratione adipisci eaque, consectetur fugit voluptatem. Quis, accusamus!</p>
                        </li>
                        <li>
                          <p>Lorem ipsum dolor sit amet, <a href="#">consectetur adipisicing</a> elit. Minima, tempore rem saepe, dignissimos ut natus similique illum labore error voluptate repellat ipsam corporis perferendis explicabo nulla tenetur beatae at quidem.</p>
                        </li>
                        <li>
                          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Id doloribus blanditiis accusamus, eveniet unde, eos sequi sapiente ullam, quibusdam nostrum error. Eveniet sit cumque natus! Maiores ratione quisquam blanditiis veniam!</p>
                        </li>
                        <li>
                          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsa unde eveniet corporis asperiores totam, alias tempora consequuntur natus sequi, laudantium, sunt officiis omnis nemo quam temporibus, quas dolorum facere sit.</p>
                        </li>
                      </ul>
                      */
                      ?>

                    </div>
                    <div class="sidebar col-sm-4 col-md-4">
                      <div class="sidebar-wrap">
                        <div class="status-cont text-center">
                          <p class="page-title-blue">{{ $project['target_fund'] }}</p>
                          <ul class="list-custom-inline list-unstyled list-inline" data-countdown="{{ $project['target_date'] }}">
                              <li><strong>Status:</strong></li>
                              <li><span>05 days</span></li>
                              <li><span>3 hours</span></li>
                              <li><span>40 mins</span></li>
                          </ul>
                        </div>
                        <hr>
                        <div class="footer-cont">
                          <div class="completed">
                            <p>Completed: {{ $project['status'] }}</p>
                            <div class="progress-plain progress">
                              <div class="progress-bar {{ $project['progress_bar'] }}" role="progressbar" aria-valuenow="{{ $project['percentage'] }}" aria-valuemin="0" aria-valuemax="100" style="width: {{ $project['percentage'] }};">
                                <span class="hide">{{ $project['percentage'] }}</span>
                              </div>
                            </div>
                          </div>
                          <ul class="list-custom list-unstyled">
                            <li>
                              Target Fund
                              <span>{{ $project['target_fund'] }}</span>
                            </li>
                            <li>
                              Funded
                              <span>{{ $project['funded'] }}</span>
                            </li>
                          </ul>
                        </div>
                        <hr>
<?php
/*
                        <div class="support-item">
                          <h3 class="support-title page-title-blue">
                            Support this project
                          </h3>
                          <p class="support-sub-title 
                          page-title-blue">US$ 500</p>
                          <ul class="list-readable">
                            <li>Lorem ipsum dolor sit amet, consectetur</li>
                            <li>adipisicing elit. Molestias officia,</li>
                            <li>nulla eius numquam eveniet distinctio quidem</li>
                            <li>reiciendis animi delectus nostrum reprehenderit natus</li>
                            <li>officiis voluptates, ad unde, tempore dolor explicabo ipsa?</li>
                          </ul>
                          <a class="btn-sidebar" href="{{ URL::route('pledge-a-project') }}">Support this amount</a>
                        </div>          
                        <hr>
                        <div class="support-item">
                          <p class="support-sub-title page-title-blue">US$ 500</p>
                          <ul class="list-readable">
                            <li>Lorem ipsum dolor sit amet, consectetur</li>
                            <li>adipisicing elit. Molestias officia,</li>
                            <li>nulla eius numquam eveniet distinctio quidem</li>
                            <li>reiciendis animi delectus nostrum reprehenderit natus</li>
                            <li>officiis voluptates, ad unde, tempore dolor explicabo ipsa?</li>
                          </ul>
                          <a class="btn-sidebar" href="{{ URL::route('pledge-a-project')}}">Support this amount</a>
                        </div>                
                      </div>
 */
?>
                    </div>
                </div>
@stop