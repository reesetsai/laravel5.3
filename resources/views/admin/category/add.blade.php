@extends('layouts.admin')
@section('content')
    <div class="crumb_warp">
        <i class="fa fa-home"></i> <a href="{{url('admin/info')}}">首頁</a> &raquo; 添加文章分類
    </div>
    <div class="result_wrap">
        <div class="result_title">
            <h3>新增分類</h3>
            @if(count($errors)>0)
                <div class="mark">
                    @foreach($errors->all() as $error)
                        <p>{{$error}}</p>
                    @endforeach
                </div>
            @endif
        </div>
    </div> 
    <div class="result_wrap">
        <form action="{{url('admin/category')}}" method="post" id="commentForm">
        {{csrf_field()}}
            <table class="add_tab">
                <tbody>
                    <tr>
                        <th width="120"><i class="require">*</i>分類：</th>
                        <td>
                            <select name="cate_pid" class="required">
                                <option value="0">==請選擇==</option>
                            @foreach($data as $style)
                                <option value="{{$style->cate_id}}">{{$style->cate_name}}</option>
                            @endforeach
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <th>分類名稱：</th>
                        <td>
                            <input type="text" name="cate_name" id="cate_name">
                        </td>
                    </tr>
                    <tr>
                        <th><i class="require">*</i>分類標題：</th>
                        <td>
                            <input type="text" class="lg" name="cate_title" id="cate_title" >
                            <p>標題最多可輸入30個字</p>
                        </td>
                    </tr>
                    <tr>
                        <th>基本描述：</th>
                        <td>
                            <textarea name="cate_keywords" id="cate_keywords"></textarea>
                        </td>
                    </tr>
                    <tr>
                        <th>詳細內容：</th>
                        <td>
                            <textarea name="cate_description" id="cate_description"></textarea>
                        </td>
                    </tr>
                    <tr>
                        <th><i class="require">*</i>排序：</th>
                        <td>
                            <input type="text" class="sm" name="cate_order" id="cate_order">
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
<script type="text/javascript">

</script>
@endsection