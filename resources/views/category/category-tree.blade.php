@foreach($children as $category)
    <div class="block">
        <div class="tree-group-item" style="cursor: pointer"> <p class="h4">{{ $category->title }}</p></div>
        @if($category->children->count())
            <div class="tree-children-group ml-3">
                @include('category.category-tree', ['children' => $category->children])
            </div>
        @endif
    </div>
@endforeach
