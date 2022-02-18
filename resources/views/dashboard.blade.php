@extends('layouts.app')

@section('title', 'Hola ' . Auth::user()->name .'!')
