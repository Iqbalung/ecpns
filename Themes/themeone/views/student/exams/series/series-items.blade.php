<?php $contents = $series->itemsList(); ?>
<div class="table">
  <table class="table table-hover table-sm">
    <thead>
      <tr>
        <th>No</th>
        <th>Title</th>
        <th class="text-right">Action</th>
      </tr>
    </thead>
    <tbody>   
        <?php $nos = 1; ?>
      @foreach($contents as $content)
      <?php 
        $url = URL_STUDENT_TAKE_EXAM.$content->slug;
        $paid = ($content->is_paid && !isItemPurchased($content->id, 'combo')) ? true : false;
        $role = getRoleData(Auth::user()->role_id); 
      ?>
      <tr>
        <td>{{$nos++}}</td>
        <td>{{$content->title}}</td>
        <td>
          <span class="buttons-right pull-right">

            <a href="javascript:void(0);" 
              @if($paid)
                onclick="showMessage('Please buy this package to continue');" 
              @else
                onclick="showInstructions('{{$url}}');" 
              @endif>
              @if($content->is_paid)
                {{getPhrase('take_exam')}}
              @endif
            </a>
          </span>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
