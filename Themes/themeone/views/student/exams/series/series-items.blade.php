<?php $contents = $series->itemsList(); ?>
<div class="table">
  <table class="table table-hover table-sm">
    <thead>
      <tr>
        <th>No</th>
        <th>Title</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>   
        <?php $nos = 1; 
        ?>
        
        @foreach($contents as $content)
        <?php 
        
        $url = "http://localhost:3000?id=".$content->id."&token=".uniqid()."&user_id=".$user->id;
        $paid = ($content->is_paid && !isItemPurchased($content->id, 'combo')) ? true : false;
        $role = getRoleData(Auth::user()->role_id); 
      ?>
      <tr>
        <td>{{$nos++}}</td>
        <td>{{$content->title}}</td>
        <td>
          <span>
            @if($content->is_paid == 0)
           <!-- Button trigger modal -->
              <button type="button" class="btn btn-link" data-toggle="modal" data-target="#exampleModalCenter">
                Buy  
              </button>
            @elseif($content->is_paid == 1)
            <a href="javascript:void(0);" onclick="showInstructions('{{$url}}');">
              @if($user_level >= $content->level)
                {{getPhrase('Take_exam')}}
              @endif
            </a>
          @endif
          </span>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>

 <!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">
          <div class="row text-center">
            <div class="col-md-12">
              <h2 class="section-title">Select Your Pain</h2>
            </div>
        </div>
        </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <section class="our-plans">
                   
          @foreach($packageslist as $package)
                        <div class="row mrt-40">
                            <div class="price-plan">
                              <div class="plan-details">
                                  <h2>{{ $package->name }}</h2>
                                  <h3>
                                    <sup>RP. </sup>
                                    <strong>{{ $package->amount }}</strong>
                                    <sub>   /
                                        @if ($package->validity == 0)
                                        {{ "forever" }}
                                        @else
                                        {{$package->validity}}
                                        @endif
                                      </sub>
                                  </h3>
                              </div>
                              <div class="plan-features">
                                    <li>{!! $package->description !!}</li>
                              </div>
                              <div class="accept-plan">
                                  <a href="{{ url('payments/checkout/subscribe/' . $package->slug) }}"
                                    class="btn btn-blue ">
                                    Buy Now
                                </a>
                              </div>
                            </div> 
                        </div>   
          @endforeach
        </section>
      </div>
    </div>
  </div>
</div>