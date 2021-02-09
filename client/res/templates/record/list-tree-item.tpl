<style>
	.knowledge_base a.link{
		color:#0f243f;
		margin-left: 15px;
	}

	.knowledge_base a:hover{
	  color:#fd7e14;
	}  
	.knowledge_base a .categories-badge{
			background-color:#fd7e14;
	}

	.knowledge_base a .knowledge_base_badge{
			float: right;
	}

	.knowledge_base a .knowledge_base_badge .badge{
		border-radius: 4px !important;
	}



	.knowledge_base .folder_icon{
	position: relative;
    top: 5px;
    left: 4px;
	}

	//.knowledge_base a .categories-badge1{
	//		background-color:#fd7e14;
	//	}
</style>

    <div class="cell knowledge_base">
        <a href="javascript:" class="action{{#unless showFold}} hidden{{/unless}} small" data-action="fold" data-id="{{model.id}}"><span class="fas fa-chevron-down"></span><span class="material-icons-outlined folder_icon">folder_open</span></a>
        <a href="javascript:" class="action{{#unless showUnfold}} hidden{{/unless}} small" data-action="unfold" data-id="{{model.id}}"><span class="fas fa-chevron-right"></span><span class="material-icons-outlined folder_icon">folder_open</span></a>
        <span style="width: 12px; display:initial;" data-name="white-space" data-id="{{model.id}}" class="empty-icon{{#unless isEnd}} hidden{{/unless}}"><i class="fa fa-circle" aria-hidden="true" style="font-size:7px;"></i><span class="material-icons-outlined folder_icon">folder_open</span></span>

        <a href="#{{model.name}}/view/{{model.id}}" class="link{{#if isSelected}} text-bold{{/if}}" data-id="{{model.id}}">{{name}} <span class="knowledge_base_badge"> <span  title="No of Sub Categories" id="sub_count{{model.id}}" class="badge number-badge categories-badge ">{{categorycount}}</span> <span  title="No of Articles" id="article_count{{model.id}}" class="badge number-badge categories-badge1">{{articlecount}}</span></span></a>
    </div> 
    <div class="children{{#unless isUnfolded}} hidden{{/unless}}">{{{children}}}</div>