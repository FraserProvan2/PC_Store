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
    border-radius: 3px;
    border: solid 2px #ffb8a2;
}
</style>
  </head>
  <body>
    <br>
    <div class="container">
        <h1 style="text-align:center;">PC<span style="color:#FF7043;">Store</span></h1>

        <div class="row">
            <div class="col-sm-12 content-a">
                <form>
                    <div class="form-group">
                        <input class="form-control form-control-lg" type="text" placeholder="Part List Name">
                    </div>

                    <div class="form-group">
                        <label for="select_cpu">CPU</label>
                        <select class="form-control" id="select_cpu">
                            @foreach($cpu_all as $cpu)
                                <option value="{{ $cpu->id }}">{{ $cpu->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                            <label for="select_mobo">Motherboard</label>
                            <select class="form-control" id="select_mobo">
                                @foreach($motherboard_all as $mobo)
                                    <option value="{{ $mobo->id }}">{{ $mobo->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    <button type="submit" class="btn btn-primary">Save</button>
                </form>
            </div>
        </div>

    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>