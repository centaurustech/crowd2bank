<div class="pagination-container">

    <?php
    	$presenter = new Illuminate\Pagination\BootstrapPresenter($paginator);
    	$presenter->setLastPage($totalPages);
    ?>
 
	@if ($totalPages> 1)
	     <ul class="pagination">
	          {{ $presenter->render() }}
	     </ul>
	@endif
 
</div>