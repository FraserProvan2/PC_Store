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
        <a class="h6 bold d-inline-block mt-3"><span class="text-primary"> {{ $part_title }} </span>
            @if($part_id != 0)
                - {{ $part_data->name }} <small class="">

                    @if($list_data['add_card'] > 0 && $part_data->type == "gpu")
                        <span class="text-primary bold h6"><u> x {{ $list_data['add_card'] + 1 }}</u></span>
                    @endif

                    @if($part_data->type == "gpu") 
                        <?php $add_extra_cpu = $list_data['add_card'] + 1; ?>
                        (£{{$part_data->price * $add_extra_cpu }})
                    @else
                        (£{{$part_data->price}})
                    @endif
            </small>
            @endif
        </a>

    </td>
    <td class="cart-price text-right">    
        @if($list_data['purchased'] == false)
            @if($part_id)  
                @if($list_data['gpu_id'] && $part_data->type == "gpu")

                    <!--Add more gpu-->
                    @if($list_data['add_card'] >= 0 && $list_data['add_card'] < 3)
                        <a href="{{ url('add-extra/gpu') }}" class="btn btn-primary"><i class="fa fa-plus" aria-hidden="true"></i>&nbsp;Add&nbsp;</a>
                    @endif

                    @if($list_data['add_card'] <= 3 && $list_data['add_card'] > 0)
                        <a href="{{ url('reduce-extra/gpu') }}" class="btn btn-secondary"><i class="fa fa-minus" aria-hidden="true"></i>&nbsp;Reduce&nbsp;</a>
                    @endif

                @endif 

                <a href="{{ url('list/' . $part) }}" class="btn btn-secondary"> <i class="fa fa-pencil" aria-hidden="true"></i></a>
                <a href="{{ url('remove/' . $part_data->id) }}" class="btn btn-danger"> <i class="fa fa-trash-o" aria-hidden="true"></i></a>

            @else
                <a href="{{ url('list/' . $part) }}" class="btn btn-primary"><i class="fa fa-plus" aria-hidden="true"></i>&nbsp;Add&nbsp;</a>
                
            @endif
        @endif
    </td>
</tr>