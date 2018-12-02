<!doctype html>
<html lang="en">
    
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>Hello, world!</title>
<style>
.content-a{
    background-color:#f3f3f3;
    padding:20px;
}
.content-b{
    background-color:#f3f3f3;
    padding:20px;
}
</style>
  </head>
  <body>
    <div class="container">
        <h1 style="text-align:center;">PC<span style="color:#FF7043;">Store</span></h1>
        <div class="row">

            <div class="col-md-10 content-a">
                <h5>Create a Part List</h5>
                <form action="/save_list" type="post">
                    <!--List Name-->
                    <div class="form-group">
                        @if(isset($part_list))
                            <input class="form-control form-control-lg" type="text" placeholder="Part List Name" name="list_name" value="<?php echo $part_list['name']; ?>" required>
                        @else
                            <input class="form-control form-control-lg" type="text" placeholder="Part List Name" name="list_name" required>
                        @endif
                    </div>

                    <!--CPU-->
                    <div class="form-group">
                        <label for="select_cpu">CPU</label>
                        {{-- {{ $part_cpu['id'] }} --}}
                        <select class="form-control" id="select_cpu" name="cpu_id" required>
                            @if(isset($part_cpu))
                                <option value="{{ $part_cpu['id'] }}">{{ $part_cpu['name'] }}</option>
                                @foreach($cpu_all as $cpu)
                                    @if($part_cpu['name'] != $cpu->name)
                                        <option value="{{ $cpu->id }}">{{ $cpu->name }}</option>
                                    @endif
                                @endforeach
                            @else
                                <option disabled selected value>Select...</option>
                                @foreach($cpu_all as $cpu)
                                    <option value="{{ $cpu->id }}">{{ $cpu->name }}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>

                    <!--Motherboard-->
                    <div class="form-group">
                        <label for="select_mobo">Motherboard</label>
                        <select class="form-control" id="select_mobo" name="mobo_id" required>
                            @if(isset($part_mobo))
                                <option value="{{ $part_mobo['id'] }}">{{ $part_mobo['name'] }}</option>
                                @foreach($motherboard_all as $mobo)
                                    @if($part_mobo['name'] != $mobo->name)
                                        <option value="{{ $mobo->id }}">{{ $mobo->name }}</option>
                                    @endif
                                @endforeach
                            @else
                                <option disabled selected value>Select...</option>
                                @foreach($motherboard_all as $mobo)
                                    <option value="{{ $mobo->id }}">{{ $mobo->name }}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>

                    <!--Buttons-->
                    <button type="submit" class="btn btn-primary">Save</button>
                    <a class="btn btn-primary" style="color:white;" href="/">Create New</a>
                    @if(isset($part_list))
                        <a class="btn btn-danger" style="color:white;" href="/view_list/delete/{{ $part_list['id'] }}">Delete</a>
                    @endif
                </form>
            </div>

            <!--Part List-->
            <div class="col-md-2 content-b">
                <h5>Part Lists</h5>
                <ul>
                    @foreach($part_list_data as $list) 
                        <li>
                            <small>
                                <a href="/view_list/{{ $list->id }}/">{{ $list->name }}</a>
                            </small>
                        </li>
                    @endforeach
                </ul>
            </div>

        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>