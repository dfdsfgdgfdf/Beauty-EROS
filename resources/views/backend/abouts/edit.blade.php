@extends('layouts.auth_admin_app')

@section('title', 'الصفحة الرئيسية (عن المركز) ')

@section('content')

    <div class="container">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex">
                <div class="col-6">
                    <h6 class="m-0 font-weight-bold text-primary">تعديل الصفحة الرئيسية (عن المركز)</h6>
                </div>
                <div class="col-6 text-right">
                    <a href="{{ route('admin.home_abouts.index') }}" class="btn btn-primary">
                        <span class="icon text-white-50">
                            <i class="fa fa-home"></i>
                        </span>
                        <span class="text">عن المركز</span>
                    </a>
                </div>
            </div>
            <div class="card-body">

                <form action="{{ route('admin.home_abouts.update', $home_about->id) }}" method="post"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="row">
                        <div class="col-9">
                            <div class="form-group">
                                <label for="title">العنوان</label>
                                <input type="text" name="title" value="{{ old('title', $home_about->title) }}" class="form-control">
                                @error('title')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                        </div>
                        <div class="col-3">
                            <label for="status">الحالة </label>
                            <select name="status" class="form-control">
                                <option value="1" {{ old('status', $home_about->status) == 1 ? 'selected' : null }}>نشط</option>
                                <option value="0" {{ old('status', $home_about->status) == 0 ? 'selected' : null }}>غير نشط</option>
                            </select>
                            @error('status')<span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-12">
                            <label for="text">النص | الوصف </label>
                            <textarea name="text" rows="5" class="form-control">{!! old('text', $home_about->text) !!}</textarea>
                            @error('text')<span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                    </div>
                    <div class="row mt-5">
                        <div class="col-12 form-group mt-5">
                            <label for="video">لينك الفيديو</label>
                            <input type="text" name="video" value="{{ old('video', $home_about->video) }}" class="form-control" placeholder="هذا الحقل اختياري - اذا كان هناك لينك فيديو برجاء اختياره من اليوتيوب">
                            @error('video')<span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                    </div>

                    <div class="row pt-4">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="image">الصورة</label>
                                <input type="file" name="image" id="category_image" class="file-input-overview">
                                <span class="form-text text-muted">Image Width Should be (500px) X (500px)</span>
                                @error('image')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                        </div>
                    </div>

                    <div class="form-group pt-4 text-center">
                        <button type="submit" name="submit" class="btn btn-primary">تعديل البيانات</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection

@section('script')
    <script>
        $(function () {
            $('#category_image').fileinput({
                theme: "fas",
                maxFileCount: 1,
                allowedFileTypes: ['image'],
                showCancel: true,
                showRemove: false,
                showUpload: false,
                overwriteInitial: false,
                initialPreview:[
                    @if ($home_about->image != '')
                        "{{url($home_about->image)}}"
                    @endif
                ],
                initialPreviewAsData: true,
                initialPreviewFileType: 'image',
                initialPreviewConfig: [
                    @if ($home_about->image != '')
                    {
                         caption: "{{ $home_about->image }}",
                         size: '1000',
                         width: "120px",
                         url: "{{ route('admin.home_abouts.removeImage', ['home_about_id'=>$home_about->id, '_token' => csrf_token()]) }}",
                         key: "{{ $home_about->id }}"
                    },
                    @endif
                ],
            });
        });
    </script>
@endsection
