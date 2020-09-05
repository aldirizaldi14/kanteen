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
                    <th style="width:15%">Bagian</th>
                    <th>Shift 1</th>
                    <th>Long Shift 1</th>
                    <th>Shift 2</th>
                    <th>Long Shift 2</th>
                    <th>Shift 3</th>
                    <th>Remark</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Office, KH, Driver & Jepang</td>
                    <td>35</td>
                    <td>0</td>
                    <td>10</td>
                    <td>0</td>
                    <td>55</td>
                    <td></td>
                </tr>
                <tr>
                    <td>Security</td>
                    <td>25</td>
                    <td>1</td>
                    <td>25</td>
                    <td>1</td>
                    <td>10</td>
                    <td></td>
                </tr>
                <tr>
                    <td>WD Injection</td>
                    <td>77</td>
                    <td>1</td>
                    <td>25</td>
                    <td>1</td>
                    <td>55</td>
                    <td></td>
                </tr>
                <tr>
                    <td>WD Compresi</td>
                    <td>26</td>
                    <td>0</td>
                    <td>11</td>
                    <td>0</td>
                    <td>35</td>
                    <td></td>
                </tr>
                <tr>
                    <td>Steel Box Press</td>
                    <td>80</td>
                    <td>0</td>
                    <td>33</td>
                    <td>1</td>
                    <td>20</td>
                    <td></td>
                </tr>
                <tr>
                    <td>Engineering</td>
                    <td>15</td>
                    <td>2</td>
                    <td>16</td>
                    <td>3</td>
                    <td>14</td>
                    <td></td>
                </tr>
                <tr>
                    <td>QC</td>
                    <td>15</td>
                    <td>2</td>
                    <td>16</td>
                    <td>3</td>
                    <td>14</td>
                    <td></td>
                </tr>
                <tr>
                    <td>Logistik</td>
                    <td>15</td>
                    <td>2</td>
                    <td>16</td>
                    <td>3</td>
                    <td>14</td>
                    <td></td>
                </tr>
                <tr>
                    <td>POE</td>
                    <td>15</td>
                    <td>2</td>
                    <td>16</td>
                    <td>3</td>
                    <td>14</td>
                    <td></td>
                </tr>
                <tr>
                    <td>WD Assy</td>
                    <td>15</td>
                    <td>2</td>
                    <td>16</td>
                    <td>3</td>
                    <td>14</td>
                    <td></td>
                </tr>
                <tr>
                    <td>BSW SUBCON</td>
                    <td>15</td>
                    <td>2</td>
                    <td>16</td>
                    <td>3</td>
                    <td>14</td>
                    <td></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
</div>
</div>
@endsection