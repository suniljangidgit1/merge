<div class="page-header">{{{header}}}</div>
<div class="search-container knowledgeBase_search">{{{search}}}</div>

<div class="row">
    {{#unless categoriesDisabled}}
    <div class="{{#unless categoriesDisabled}} col-md-4 col-sm-4{{else}} col-md-12{{/unless}} list-categories-column">
    	<div class="knowledgeBase">
        <table class="table">
		    <thead class="schedularth">
		      <tr>
		        <th>Categories Name</th>
		      </tr>
		    </thead>
		    <tbody>
		      <tr>
		        <td>
		           <div class="categories-container">{{{categories}}}</div>

		        </td>
		      
		      </tr>
		    </tbody>
		  </table>
		</div>
    </div>
    {{/unless}}
    <div class="{{#unless categoriesDisabled}} col-md-8 col-sm-8{{else}} col-md-12{{/unless}} list-main-column">
       <!--  <div class="nested-categories-container{{#if isExpanded}} hidden{{/if}}">{{{nestedCategories}}}</div> -->
        <div class="list-container knowledgeBase_list">{{{list}}}</div>
    </div>
</div>
