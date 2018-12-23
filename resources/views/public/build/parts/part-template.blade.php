<?php 

//gets type passed into partial view
$part = $part_type[0];

//configures template passed on param
switch($part) {
    case 'case';
            $part_data = $case_data;
            $part_id = $list_data['case_id'];
            $part_title = "Case";
        break;
    case 'cooler';
            $part_data = $cooler_data;
            $part_id = $list_data['cooler_id'];
            $part_title = "CPU Cooler";
        break;
    case 'cpu';
            $part_data = $cpu_data;
            $part_id = $list_data['cpu_id'];
            $part_title = "Processor";
        break;
    case 'gpu';
            $part_data = $gpu_data;
            $part_id = $list_data['gpu_id'];
            $part_title = "Graphics Card";
        break;
    case 'motherboard';
            $part_data = $mobo_data;
            $part_id = $list_data['mobo_id'];
            $part_title = "Motherboard";
        break;
    case 'powersupply';
            $part_data = $powersupply_data;
            $part_id = $list_data['powersupply_id'];
            $part_title = "Power Supply";
        break;
    case 'ram';
            $part_data = $ram_data;
            $part_id = $list_data['ram_id'];
            $part_title = "RAM";
        break;
    case 'storage';
            $part_data = $storage_data;
            $part_id = $list_data['storage_id'];
            $part_title = "Storage";
    break;
}

?>

<tr>
    <td class="cart-title">
        <a class="h6 bold d-inline-block"><span class="text-primary"> {{ $part_title }} </span>

            @if($part_id != 0)
                - {{ $part_data->name }} <small class="">(£{{ $part_data->price }})</small>
            @endif
        </a>
        
        <br> 

        @if($part_id != 0)
            
        @else
            
        
        @endif
    </td>
    <td class="cart-price text-right">    
        @if($part_id)   
            <a href="/list/{{ $part }}" class="btn-sm btn-secondary"> <i class="fa fa-pencil" aria-hidden="true"></i></a>
            <a href="/remove/{{$part_data->id}}" class="btn-sm btn-danger"> <i class="fa fa-trash-o" aria-hidden="true"></i></a>
            
        @else
            <a href="/list/{{ $part }}" class="btn btn-primary">&nbsp;Add <i class="fa fa-plus" aria-hidden="true"></i>&nbsp;</a>
            
        @endif
    </td>
</tr>