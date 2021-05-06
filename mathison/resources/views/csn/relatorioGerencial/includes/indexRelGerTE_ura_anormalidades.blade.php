@extends('csn.templates.templateRelatorios')

	@section('content')
		@include('csn.relatorioGerencial.includes.navbarRelGer.navbarRelGerTE')
		@include('csn.relatorioGerencial.includes.relatoriosTermoEletrica.ura-anormalidades')
	@endsection
