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
            
            @if($user_level >= $content->level)
            <a href="javascript:void(0);" onclick="showInstructions('{{$url}}');">
                {{getPhrase('take_exam')}}
              </a>
            @endif
            @if($user_level < $content->level)
           <!-- Button trigger modal -->
              <button type="button" class="btn-link" data-toggle="modal" data-target="#exampleModalCenter">
                Buy  
              </button>
            @endif
          </span>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>

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
      <div class="modal-body" id="modal-body">

        <div class="row ">
          @foreach($packageslist as $package)
                <div class="col-md-4 col-sm-6 princing-item yellow">
                    <div class="{{ ($package->validity > 0) ? 'pricing-divider-yellow' : 'pricing-divider-red' }} m-auto text-center w-75">
                                <h3 class="text-light {{ ($package->validity > 0) ? 'h6-yellow' : 'h6-red' }}">
                                {{ ucfirst($package->name) }}
                                </h3>
                                            <h4 class="my-0 display-4 text-light font-weight-normal mb-3 {{ ($package->validity > 0) ? 'h6-yellow' : 'h6-red' }}"><span class="h3"></span>  {{ getCurrencyCode() }} {{ idrFormat((int) $package->amount) }} 
                                            <svg class='pricing-divider-img' enable-background='new 0 0 300 100' height='100px' id='Layer_1' preserveAspectRatio='none' version='1.1' viewBox='0 0 300 100' width='300px' x='0px' xml:space='preserve' xmlns:xlink='http://www.w3.org/1999/xlink' xmlns='http://www.w3.org/2000/svg' y='0px'>
                                        <path class='deco-layer deco-layer--1' d='M30.913,43.944c0,0,42.911-34.464,87.51-14.191c77.31,35.14,113.304-1.952,146.638-4.729
                                    c48.654-4.056,69.94,16.218,69.94,16.218v54.396H30.913V43.944z' fill='#FFFFFF' opacity='0.6'></path>
                                        <path class='deco-layer deco-layer--2' d='M-35.667,44.628c0,0,42.91-34.463,87.51-14.191c77.31,35.141,113.304-1.952,146.639-4.729
                                    c48.653-4.055,69.939,16.218,69.939,16.218v54.396H-35.667V44.628z' fill='#FFFFFF' opacity='0.6'></path>
                                        <path class='deco-layer deco-layer--3' d='M43.415,98.342c0,0,48.283-68.927,109.133-68.927c65.886,0,97.983,67.914,97.983,67.914v3.716
                                    H42.401L43.415,98.342z' fill='#FFFFFF' opacity='0.7'></path>
                                        <path class='deco-layer deco-layer--4' d='M-34.667,62.998c0,0,56-45.667,120.316-27.839C167.484,57.842,197,41.332,232.286,30.428
                                    c53.07-16.399,104.047,36.903,104.047,36.903l1.333,36.667l-372-2.954L-34.667,62.998z' fill='#FFFFFF'></path>
                                        </svg>
                    </div>

                        <div class="card-body cs-white-bg mt-0 shadow">
                            <div class="mb-5 position-relative list-group">
                                
                                <div class="text-center"> {!! $package->description !!}</div>

                                <div class="text-center mt-2">
                                    <a href="{{ url('payments/checkout/subscribe/' . $package->slug) }}"
                                        class="btn {{ ($package->validity > 0) ? 'btn-yellow' : 'btn-red' }} btn-block btn-radius">
                                        Buy Now
                                    </a>
                                </div>
                            </div>
                           
                        </div>
                </div>
            @endforeach

        </div>
      </div>
    </div>
  </div>
</div>
