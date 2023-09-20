@extends('layouts.admin')
@section('content')
<div class="col-lg-12">
    <div class="card bg-info text-dark">
        <div class="card-header">Product List</div>
        <div class="card-body">

                <form action="{{ route('product_stored') }}" method="post" enctype="multipart/form-data"  >
                    @csrf
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="card">
                                <div class="card-header">Catagory List</div>
                                <div class="card-body">
                                    <div class="mb-3">
                                        <label for="">Catagory</label>
                                        <select name="catagory" id="catagory" class="form-control">
                                            <option value="">select catagory</option>
                                            @foreach ($catagories as $catagory)

                                            <option value="{{ $catagory->id }}">{{ $catagory->catagory_name }}</option>

                                            @endforeach

                                        </select>
                                        @error('catagory')
                                        <strong class="text-danger">{{ $message }}</strong>

                                        @enderror
                                    </div>

                                </div>
                            </div>

                        </div>
                        <div class="col-lg-4">
                            <div class="card">
                                <div class="card-header">SubCatagory List</div>
                                <div class="card-body">
                                    <div class="mb-3">
                                        <label for="">Sub Catagory</label>
                                        <select name="subcatagory_id" id="subcatagory_id" class="form-control">
                                            <option value="">select subcatagory</option>
                                            @foreach ($sub_catagories as $sub_catagory)
                                            <option value="{{ $sub_catagory->id }}">{{ $sub_catagory->subcatagory_name }}</option>

                                            @endforeach
                                        </select>
                                        @error('subcatagory_id')
                                        <strong class="text-danger">{{ $message }}</strong>

                                        @enderror
                                    </div>

                                </div>
                            </div>

                        </div>


                         <div class="col-lg-4">
                            <div class="card">
                                <div class="card-header">Brand List</div>
                                <div class="card-body">
                                    <div class="mb-3">
                                        <label for="">Catagory</label>
                                        <select name="brand_id" id="brand_id" class="form-control">
                                            <option value="">select brand</option>
                                            @foreach ($brands as $brand)
                                            <option value="{{ $brand->id }}">{{ $brand->brand_name }}</option>

                                            @endforeach
                                        </select>
                                        @error('brand_id')
                                        <strong class="text-danger">{{ $message }}</strong>

                                        @enderror
                                    </div>

                                </div>
                            </div>

                        </div>

                        <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="product_name">Product Name</label>
                                        <input type="text" name="product_name" class="form-control">

                                        @error('product_name')
                                        <strong class="text-danger">{{ $message }}</strong>

                                        @enderror

                                    </div>

                        </div>
                         <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="product_price">Product Price</label>
                                <input type="number" name="product_price" class="form-control">
                                @error('product_price')
                                <strong class="text-danger">{{ $message }}</strong>

                                @enderror

                            </div>
                         </div>
                         <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="discount">Discount</label>
                                <input type="number" name="discount" class="form-control">

                            </div>
                         </div>



                         <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="discount">Tags</label>
                                <input type="text" required name="tags[]" class="form-control" id="input-tags">

                                @error('tags[]')
                                <strong class="text-danger">{{ $message }}</strong>

                                @enderror

                            </div>

                         </div>

                         <div class="col-lg-12">
                            <div class="mb-3">
                                <label for="discount">Short Description</label>
                                <textarea type="text" name="short_desp" class="form-control" id="input-tags"></textarea>
                                @error('short_desp')
                                <strong class="text-danger">{{ $message }}</strong>

                                @enderror

                            </div>
                         </div>

                         <div class="col-lg-12">
                            <div class="mb-3">
                                <label for="discount">Logn Description</label>
                                <textarea type="text"  id="summernote"  name="long_desp" class="form-control" id="input-tags"></textarea>
                                @error('long_desp')
                                <strong class="text-danger">{{ $message }}</strong>

                                @enderror

                            </div>
                         </div>

                         <div class="col-lg-12">
                            <div class="mb-3">
                                <label for="discount">Additional Description</label>
                                <textarea type="text" id="summernote2" name="add_desp" class="form-control" ></textarea>
                                @error('add_desp')
                                <strong class="text-danger">{{ $message }}</strong>

                                @enderror

                            </div>
                         </div>

                         <div class="col-lg-12">
                            <div class="mb-3">
                                <label for="discount">Preview Images</label>
                                <input type="file" name="preview" class="form-control" >
                                @error('preview')
                                <strong class="text-danger">{{ $message }}</strong>

                                @enderror

                            </div>
                         </div>
                         <div class="col-lg-12">

                            <div class="upload__box">
                                <div class="upload__btn-box">
                                  <label class="upload__btn">
                                    <p>Upload imagesffffff</p>
                                    <input type="file" name="gallery[]" multiple="" data-max_length="20" class="upload__inputfile">

                                  </label>
                                </div>

                                <div class="upload__img-wrap"></div>
                              </div>

                         </div>
                         <div class="col-lg-12">
                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary">submit</button>
                            </div>
                         </div>















                    </div>
                </form>

        </div>
    </div>
</div>

@endsection
@section('footer_script')
<script>
    $('#catagory').change(function(){
        var catagory_id=$(this).val();

        $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
$.ajax({
    type:'POST',
    url:'/getsubcatagory',
    data:{'catagory_id':catagory_id},
    success:function(data){
        $('#subcatagory_id').html(data)


    }
})

    });
</script>
<script>

$("#input-tags").selectize({
  delimiter: ",",
  persist: false,
  create: function (input) {
    return {
        value: input,
        text: input,
    };
  },
});
</script>
<script>
    $(document).ready(function() {
  $('#summernote').summernote();

});

$(document).ready(function() {
  $('#summernote2').summernote();

});

</script>
<script>

jQuery(document).ready(function () {
  ImgUpload();
});

function ImgUpload() {
  var imgWrap = "";
  var imgArray = [];

  $('.upload__inputfile').each(function () {
    $(this).on('change', function (e) {
      imgWrap = $(this).closest('.upload__box').find('.upload__img-wrap');
      var maxLength = $(this).attr('data-max_length');

      var files = e.target.files;
      var filesArr = Array.prototype.slice.call(files);
      var iterator = 0;
      filesArr.forEach(function (f, index) {

        if (!f.type.match('image.*')) {
          return;
        }

        if (imgArray.length > maxLength) {
          return false
        } else {
          var len = 0;
          for (var i = 0; i < imgArray.length; i++) {
            if (imgArray[i] !== undefined) {
              len++;
            }
          }
          if (len > maxLength) {
            return false;
          } else {
            imgArray.push(f);

            var reader = new FileReader();
            reader.onload = function (e) {
              var html = "<div class='upload__img-box'><div style='background-image: url(" + e.target.result + ")' data-number='" + $(".upload__img-close").length + "' data-file='" + f.name + "' class='img-bg'><div class='upload__img-close'></div></div></div>";
              imgWrap.append(html);
              iterator++;
            }
            reader.readAsDataURL(f);
          }
        }
      });
    });
  });

  $('body').on('click', ".upload__img-close", function (e) {
    var file = $(this).parent().data("file");
    for (var i = 0; i < imgArray.length; i++) {
      if (imgArray[i].name === file) {
        imgArray.splice(i, 1);
        break;
      }
    }
    $(this).parent().parent().remove();
  });
}
</script>
@endsection
