<tr>
    <td class="cart-title">
        <a href="shop-single.html" class="h6 bold d-inline-block" title="Hanes Hooded Sweatshirt"> CPU
            @if($list_data['cpu_id'])
                - {{ $cpu_data->name }}
            @endif
        </a>
        
        <br> 

        @if($list_data['cpu_id'])
            <small class=""><b>£</b>{{ $cpu_data->price }}</small>
        @else
            
        
        @endif
    </td>
    <td class="cart-price text-right">    
        @if($list_data['cpu_id'])   
            <a href="/build/view-cpu" class="btn-sm btn-secondary"> <i class="fa fa-pencil" aria-hidden="true"></i></a>
            <a href="/build/remove-cpu" class="btn-sm btn-danger"> <i class="fa fa-trash-o" aria-hidden="true"></i></a>
            <span class="roboto-condensed bold"></span>
        @else
            <a href="/build/view-cpu" class="btn-sm btn-primary">Add <i class="fa fa-plus" aria-hidden="true"></i></a>
        @endif
    </td>
</tr>