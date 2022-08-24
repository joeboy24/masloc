
{{-- my pagination works perfectly --}}

@if($paginator->hasPages())

{{-- <nav aria-label="Page navigation example">  --}}
    <ul class="pagination pagination-primary">
        <li class="page-item"><a class="page-link" href="#">Prev</a></li>
        {{-- <li class="page-item"><a class="page-link" href="#">1</a></li>
        <li class="page-item active"><a class="page-link" href="#">2</a></li>
        <li class="page-item"><a class="page-link" href="#">3</a></li> --}}
        <li class="page-item"><a class="page-link" href="#">Next</a></li>
    </ul>
{{-- </nav> --}}

@endif