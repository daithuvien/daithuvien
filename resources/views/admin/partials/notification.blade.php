@if(Session::has('success'))
  <div class="alert alert-success alert-dismissible show flex items-center mb-2" role="alert"> 
    <i data-lucide="alert-triangle" class="w-6 h-6 mr-2"></i> {{Session::get('success')}} 
    <button type="button" class="btn-close" data-tw-dismiss="alert" aria-label="Close"> 
      <i data-lucide="x" class="w-4 h-4"></i> 
    </button> 
  </div>
@elseif(Session::has('error'))
  <div class="alert alert-danger alert-dismissible show flex items-center mb-2" role="alert"> 
    <i data-lucide="alert-octagon" class="w-6 h-6 mr-2"></i> {{Session::get('error')}} 
    <button type="button" class="btn-close text-white" data-tw-dismiss="alert" aria-label="Close"> 
      <i data-lucide="x" class="w-4 h-4"></i> 
    </button> 
  </div>
@endif
