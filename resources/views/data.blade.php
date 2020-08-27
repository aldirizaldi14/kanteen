@extends('layouts.home')

@section('content')
<div class="card">
    <div class="card-header">{{ __('Data') }}</div>
    <div class="card-body">
        <table id="example" class="display" style="width:100%">
            <thead>
                <tr>
                    <th>Tanggal</th>
                    <th>Shift</th>
                    <th>Snack 1 Dimakan</th>
                    <th>Snack 2 Dimakan</th>
                    <th>Menu 1 Dimakan</th>
                    <th>Menu 2 Dimakan</th>
                    <th>Menu 3 Dimakan</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>14-08-2020</td>
                    <td>Shift 1</td>
                    <td>35</td>
                    <td>14</td>
                    <td>10</td>
                    <td>25</td>
                    <td>55</td>
                </tr>
                <tr>
                    <td>14-08-2020</td>
                    <td>Shift 2</td>
                    <td>25</td>
                    <td>14</td>
                    <td>25</td>
                    <td>45</td>
                    <td>10</td>
                </tr>
                <tr>
                    <td>14-08-2020</td>
                    <td>Shift 3</td>
                    <td>77</td>
                    <td>10</td>
                    <td>25</td>
                    <td>10</td>
                    <td>55</td>
                </tr>
                <tr>
                    <td>15-08-2020</td>
                    <td>Shift 1</td>
                    <td>26</td>
                    <td>34</td>
                    <td>11</td>
                    <td>66</td>
                    <td>35</td>
                </tr>
                <tr>
                    <td>15-08-2020</td>
                    <td>Shift 2</td>
                    <td>80</td>
                    <td>0</td>
                    <td>33</td>
                    <td>27</td>
                    <td>20</td>
                </tr>
                <tr>
                    <td>15-08-2020</td>
                    <td>Shift 3</td>
                    <td>15</td>
                    <td>15</td>
                    <td>16</td>
                    <td>25</td>
                    <td>14</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
</div>
</div>
@endsection