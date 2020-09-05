@extends('layouts.home')

@section('content')
<div class="card h-100">
    <div class="card-header">
    <table class="w-100">
    <tr>
    <td align="left">{{ __('Data') }}</td>
    <td align="right">
    <a href="/data" class="btn btn-sm btn-outline-primary">Data</a>
    <a href="/data/makan" class="btn btn-sm btn-outline-dark">Makan</a>
    </td>
    </tr>
    </table>
    </div>
    <div class="card-body">
        <table id="example" class="display" style="width:100%">
            <thead>
                <tr>
                    <th style="width:15%">Tanggal</th>
                    <th>Shift 1</th>
                    <th>Long Shift 1</th>
                    <th>Shift 2</th>
                    <th>Long Shift 2</th>
                    <th>Shift 3</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><a href="12-08-2020">12-08-2020</a></td>
                    <td>35</td>
                    <td>0</td>
                    <td>10</td>
                    <td>0</td>
                    <td>55</td>
                </tr>
                <tr>
                    <td><a href="13-08-2020">13-08-2020</a></td>
                    <td>25</td>
                    <td>1</td>
                    <td>25</td>
                    <td>1</td>
                    <td>10</td>
                </tr>
                <tr>
                    <td><a href="14-08-2020">14-08-2020</a></td>
                    <td>77</td>
                    <td>1</td>
                    <td>25</td>
                    <td>1</td>
                    <td>55</td>
                </tr>
                <tr>
                    <td><a href="15-08-2020">15-08-2020</a></td>
                    <td>26</td>
                    <td>0</td>
                    <td>11</td>
                    <td>0</td>
                    <td>35</td>
                </tr>
                <tr>
                    <td><a href="16-08-2020">16-08-2020</a></td>
                    <td>80</td>
                    <td>0</td>
                    <td>33</td>
                    <td>1</td>
                    <td>20</td>
                </tr>
                <tr>
                    <td><a href="17-08-2020">17-08-2020</a></td>
                    <td>15</td>
                    <td>2</td>
                    <td>16</td>
                    <td>3</td>
                    <td>14</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
</div>
</div>
@endsection