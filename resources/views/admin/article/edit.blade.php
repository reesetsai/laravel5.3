@extends('layouts.admin')
@section('content')
    <div class="crumb_warp">
        <i class="fa fa-home"></i> <a href="{{url('admin/info')}}">首頁</a> &raquo; 新增文章分類
    </div>
    <div class="result_wrap">
        <div class="result_title">
            <h3>編輯文章</h3>
    @if(count($errors)>0)
        <div class="mark">
            @if(is_object($errors))
                @foreach($errors->all() as $error)
                    <p>{{$error}}</p>
                @endforeach
            @else
                <p>{{$errors}}</p>
            @endif
        </div>
    @endif
        </div>
    </div>
    <div class="result_wrap">
        <form action="{{url('admin/article/'.$field->art_id)}}" method="post" id="commentForm">
        <input type="hidden" name="_method" value="put">
        {{csrf_field()}}
            <table class="add_tab">
                <tbody>
                    <tr>
                        <th width="120"><i class="require">*</i>分類：</th>
                        <td>
                            <select name="cate_id" class="required">
                            @foreach($data as $style)
                                <option value="{{$style->cate_id}}"
                                @if($style->cate_id == $field->art_id) selected="selected"
                                @endif>{{$style->_cate_name}}</option>
                            @endforeach
                            </select>
                        </td>
                    </tr>
                        <th><i class="require"></i>文章標題：</th>
                        <td>
                            <input type="text" class="lg" name="art_title" id="art_title" value="{{$field->art_title}}">
                        </td>
                    </tr>
                    <tr>
                        <th>作者：</th>
                        <td>
                            <input type="text" class="sm" name="art_editor" id="art_editor" value="{{$field->art_editor}}">
                        </td>
                    </tr>
                    <tr>
                        <th><i class="require"></i>縮圖：</th>
                        <td>
                            <input type="text" class="lg" size="50" name="art_thumb" id="art_thumb" value="{{$field->art_thumb}}">
                            <input id="file_upload" name="file_upload" type="file" multiple="true">
                            <script type="text/javascript" src="{{asset('/js/uploadify/jquery.uploadify.min.js')}}"></script>
                            <link rel="stylesheet" type="text/css" href="{{asset('/js/uploadify/uploadify.css')}}">
                        </td>
                    </tr>
                    <tr>
                        <th></th>
                        <td>
                            <img src="/{{$field->art_thumb}}" alt="" id="art_thumb_img" style="max-height: 350px;max-width: 300px;">
                        </td>
                    </tr>
                    <tr>
                        <th>關鍵字：</th>
                        <td>
                            <input type="text" class="lg" name="art_tag" id="art_tag" value="{{$field->art_tag}}">
                        </td>
                    </tr>
                    <tr>
                        <th>內容描述：</th>
                        <td>
                            <textarea name="art_description" id="art_description">{{$field->art_description}}</textarea>
                        </td>
                    </tr>

                    <tr>
                        <th>文章內容：</th>
                        <td>
                            <textarea name="art_content" id="art_content">{{$field->art_content}}</textarea>
                        </td>
                    </tr>
                    <tr>
                        <th></th>
                        <td>
                            <input type="submit" value="送出">
                            <input type="button" class="back" onclick="history.go(-1)" value="返回">
                        </td>
                    </tr>
                </tbody>
            </table>
        </form>
    </div>
<style type="text/css">

    .uploadify{display: inline-block;}
    .uploadify-button{border: none;border-radius: :5px; margin-top: 8px}
    table.add_tab tr td span,uploadify-button-text{color:#FFF; margin:0;}
    
</style>
<script>tinymce.init({ selector:'textarea',language:'zh_TW'});</script>
<script type="text/javascript">
    <?php $timestamp = time();?>
    $(function() {
        $('#file_upload').uploadify({
            'formData'     : {
                'timestamp' : '<?php echo $timestamp;?>',
                '_token'     : "{{csrf_token()}}"
            },
            'swf'      : '{{asset('/js/uploadify/uploadify.swf')}}',
            'uploader' : '{{url('/admin/upload')}}',
            'buttonText' : '圖片上傳',

            'onUploadSuccess' : function(file, data, response) {
                $('input[name=art_thumb]').val(data);
                $('#art_thumb_img').attr('src','/'+data);
            }
        });
    });
</script>
@endsection