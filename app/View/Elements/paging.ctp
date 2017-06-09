<?php if($this->Paginator->counter('{:current}') > 0):?>
<div class="dataTables_info" id="DataTables_Table_8_info" style="width:80%">

<?php echo $this->Paginator->counter(    'Page <span>{:page}</span> of <span>{:pages}</span>, showing <span>{:current}</span> records out of     <span>{:count}</span> total, starting on record <span>{:start}</span>, ending on <span>{:end}</span>');

// echo $this->Paginator->counter('Page <span>{:page}</span> of <span>{:pages}</span> Total: <span>{:count}</span>');

?>


	 
	</div>




<div class="dataTables_paginate paging_bs_normal" id="datatable_paginate"  style="width:900px">
<?php
if($this->request->params['controller'] == 'test'):
$class = 'validatePage testPaging'; 
elseif($this->request->params['controller'] == 'test2'):
$class = 'validatePage2'; 
endif;
?>

<?php if($this->Paginator->counter('{:page}') != 1): 
 
// Shows the next and previous links
// echo $this->Paginator->first('First ', null, null, array('class' => 'paginate_button'));

// Shows the next and previous links
?>
<div style="float:left;">
<?php 
echo $this->Paginator->prev('Previous ',array('title' => 'Save and Proceed to Previous..', 'data-toggle' => 'tooltip','tag' => 'div','class' => $class.' btn btn-sm bg-purple2 white'));
?>

</div>

<?php endif; ?>

<span>

<?php // Shows the page numbers
// echo $this->Paginator->numbers(array('tag' => '', 'separator' => ' ', 'currentTag' => 'a', 'currentClass' => 'active'));
?>

</span>


<?php if($this->Paginator->counter('{:pages}') != $this->Paginator->counter('{:page}')): ?>
<div style="float:right;">
<?php 
echo $this->Paginator->next(' Next',array('class' => $class.' btn btn-sm bg-purple2 white',  'title' => 'Save and Proceed to Next..', 'data-toggle' => 'tooltip', 'tag' => 'div')); 
?>
</div>
<?php
// echo $this->Paginator->next(' Last', null, null, array('class' => 'next paginate_button'));

?>


<?php endif; ?>

</div>

<?php endif; ?>


&nbsp;