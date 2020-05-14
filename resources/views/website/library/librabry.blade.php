@extends('website.layout.index')
@section('title','Tin Tức ABC')
@section('content')
<div class="col2">
    <!-- BEGIN col1-->
<div class="menu-active hide">thu-vien</div>
<div class="page-about">
<div class="nav">
<ul class="breadcrumb">
    <li>
        <a class="selected" href="thu-vien" style="color: black;">Thư viện</a>
    </li>
</ul>
</div>
<div class="about-menu">
    @foreach ($listTypeDocuments as $listTypeDocument)
    <div class="item @if($listTypeDocument->slug_name_type_document == $currentSlugdocumentType ) selected @endif">
    <a class="title" href="thu-vien/{{  $listTypeDocument->slug_name_type_document  }}">{{ $listTypeDocument->name_type_document }}</a>
</div>
    @endforeach
    </div>

<div class="article">
<div class="content"><table>

<tbody>
    @foreach ($documents as $key=>$document)   
    <tr>
    <td>{{  1 }}.</td>
    <td>{{ $document->name_documents }}</td>
    <td style="vertical-align:middle"><a href="thu-vien/tai-lieu/{{ $document->slug_name_documents }}">Tải về</a></td>
    </tr>
    @endforeach
</tbody>
</table>



</div>
</div>
</div>
</div>
@stop