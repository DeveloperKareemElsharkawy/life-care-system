<div class="form-group m-0 mt-2">
    <label class="form-label">@lang('admin/datatable.'.$name)</label>
    <div class="row g-xs">
        <div class="col-auto">
            <label class="colorinput">
                <input name="{{$name}}" @checked($value == 'azure') type="radio" value="azure" class="colorinput-input"
                       checked="">
                <span class="colorinput-color bg-azure"></span>
            </label>
        </div>
        <div class="col-auto">
            <label class="colorinput">
                <input name="{{$name}}" @checked($value == 'indigo') type="radio" value="indigo"
                       class="colorinput-input">
                <span class="colorinput-color bg-indigo"></span>
            </label>
        </div>
        <div class="col-auto">
            <label class="colorinput">
                <input name="{{$name}}" @checked($value == 'purple') type="radio" value="purple"
                       class="colorinput-input">
                <span class="colorinput-color bg-purple"></span>
            </label>
        </div>
        <div class="col-auto">
            <label class="colorinput">
                <input name="{{$name}}" @checked($value == 'pink')  type="radio" value="pink" class="colorinput-input">
                <span class="colorinput-color bg-pink"></span>
            </label>
        </div>
        <div class="col-auto">
            <label class="colorinput">
                <input name="{{$name}}" @checked($value == 'red') type="radio" value="red" class="colorinput-input">
                <span class="colorinput-color bg-red"></span>
            </label>
        </div>
        <div class="col-auto">
            <label class="colorinput">
                <input name="{{$name}}" @checked($value == 'orange')  type="radio" value="orange"
                       class="colorinput-input">
                <span class="colorinput-color bg-orange"></span>
            </label>
        </div>
        <div class="col-auto">
            <label class="colorinput">
                <input name="{{$name}}" @checked($value == 'yellow')  type="radio" value="yellow"
                       class="colorinput-input">
                <span class="colorinput-color bg-yellow"></span>
            </label>
        </div>
        <div class="col-auto">
            <label class="colorinput">
                <input name="{{$name}}" @checked($value == 'lime')  type="radio" value="lime" class="colorinput-input">
                <span class="colorinput-color bg-lime"></span>
            </label>
        </div>
        <div class="col-auto">
            <label class="colorinput">
                <input name="{{$name}}" @checked($value == 'green')  type="radio" value="green"
                       class="colorinput-input">
                <span class="colorinput-color bg-green"></span>
            </label>
        </div>
        <div class="col-auto">
            <label class="colorinput">
                <input name="{{$name}}" @checked($value == 'teal')  type="radio" value="teal" class="colorinput-input">
                <span class="colorinput-color bg-teal"></span>
            </label>
        </div>
        <div class="col-auto">
            <label class="colorinput">
                <input name="{{$name}}" @checked($value == 'black')  type="radio" value="black"
                       class="colorinput-input">
                <span class="colorinput-color bg-black"></span>
            </label>
        </div>
        <div class="col-auto">
            <label class="colorinput">
                <input name="{{$name}}" @checked($value == 'white')  type="radio" value="white"
                       class="colorinput-input">
                <span class="colorinput-color bg-white color-br"></span>
            </label>
        </div>
        <input type="hidden" id="{{$name}}">
    </div>
</div>
