

<style>

</style>

<table class="table table-striped">
    <h1 class="public-university-text"><span style="font-family:Times New Roman; Color:black;">Private University</span></h1>
    <thead>
    <tr>

        <th scope="col">logo</th>
        <th scope="col">University</th>
        <th scope="col">Program</th>
        <th scope="col">Tuition fees</th>
        <th scope="col">Living cost</th>
        <th scope="col">Application date</th>
    </tr>
    </thead>
    <tbody>
    @foreach ($privateUniversities as $public_university)
        <tr>

            <td >
                <img
                    alt="image"
                    src="{{asset($public_university->image)}}"
                    height="50px"
                    class="ms-3"
                />
            </td>
            <td>
                {{$public_university->name}}
            </td>
            <td>
                {{$public_university->program}}
            </td>
            <td>
                {{$public_university->tuition_fee}}
            </td>
            <td>
                {{$public_university->living_cost}}
            </td>
            <td>
                @if(!empty($public_university->application_date))
                    {{ $public_university->application_date }}
                @elseif(!empty($public_university->application_date_2))
                    {{ $public_university->application_date_2 }}
                @elseif(!empty($public_university->application_date_3))
                    {{ $public_university->application_date_3 }}
                @else
                    N/A
                @endif
            </td>
        </tr>
    @endforeach
    </tbody>
</table>







{{--<div--}}
{{--          class="public-university-container public-university-root-class-name5"--}}
{{--        >--}}
{{--        <h1 class="public-university-text"><span style="font-family:Times New Roman;">Privet University</span></h1>--}}
{{--          <div class="public-university-container1">--}}
{{--            <div class="university-list-header-container university-list-header-root-class-name2">--}}
{{--              <div class="university-list-header-container1">--}}
{{--                <span class="university-list-header-text">--}}
{{--                  <span style="font-family:Times New Roman;">logo</span>--}}
{{--                </span>--}}
{{--              </div>--}}
{{--              <div class="university-list-header-container2">--}}
{{--                <span class="university-list-header-text01">--}}
{{--                  <span style="font-family:Times New Roman;">University</span>--}}
{{--                </span>--}}
{{--              </div>--}}
{{--              <div class="university-list-header-container4">--}}
{{--                <span class="university-list-header-text03">--}}
{{--                  <span style="font-family:Times New Roman;">Program</span>--}}
{{--                </span>--}}
{{--              </div>--}}
{{--              <div class="university-list-header-container5">--}}
{{--                <span class="university-list-header-text04">--}}
{{--                  <span style="font-family:Times New Roman;">Tuition fees</span>--}}
{{--                </span>--}}
{{--              </div>--}}
{{--              <div class="university-list-header-container6">--}}
{{--                <span class="university-list-header-text05">--}}
{{--                  <span style="font-family:Times New Roman;">Living cost</span>--}}
{{--                </span>--}}
{{--              </div>--}}
{{--              <div class="university-list-header-container7">--}}
{{--                <span class="university-list-header-text06">--}}
{{--                  <span style="font-family:Times New Roman;">Application date</span>--}}
{{--                  <span></span>--}}
{{--                </span>--}}
{{--              </div>--}}
{{--            </div>--}}

{{--            @foreach ($privateUniversities as $public_university)--}}
{{--            <div class="public-university-container2">--}}
{{--                <a href="{{ route('study.abroad.university', $public_university->name) }}" class="university-list-container">--}}
{{--                  <div class="university-list-container1">--}}
{{--                    <img--}}
{{--                      alt="image"--}}
{{--                      src="{{asset($public_university->image)}}"--}}
{{--                      class="university-list-image"--}}
{{--                    />--}}
{{--                  </div>--}}
{{--                  <div class="university-list-container2">--}}
{{--                    <span class="university-list-text">--}}
{{--                      <span style="font-family:Times New Roman;">{{$public_university->name}}</span>--}}
{{--                    </span>--}}
{{--                  </div>--}}
{{--                  <div class="university-list-container4">--}}
{{--                    <span class="university-list-text2">--}}
{{--                      <span style="font-family:Times New Roman;">{{$public_university->program}}</span>--}}
{{--                    </span>--}}
{{--                  </div>--}}
{{--                  <div class="university-list-container5">--}}
{{--                    <span class="university-list-text3">--}}
{{--                      <span style="font-family:Times New Roman;">{{$public_university->tuition_fee}}</span>--}}
{{--                    </span>--}}
{{--                  </div>--}}
{{--                  <div class="university-list-container6">--}}
{{--                    <span class="university-list-text4">--}}
{{--                      <span style="font-family:Times New Roman;">{{$public_university->living_cost}}</span>--}}
{{--                    </span>--}}
{{--                  </div>--}}
{{--                    <div class="university-list-container7">--}}
{{--                    <span class="university-list-text5" style="font-family:Times New Roman;">--}}
{{--                        @if(!empty($public_university->application_date))--}}
{{--                            {{ $public_university->application_date }}--}}
{{--                        @elseif(!empty($public_university->application_date_2))--}}
{{--                            {{ $public_university->application_date_2 }}--}}
{{--                        @elseif(!empty($public_university->application_date_3))--}}
{{--                            {{ $public_university->application_date_3 }}--}}
{{--                        @else--}}
{{--                            N/A--}}
{{--                        @endif--}}
{{--                    </span>--}}
{{--                </div>--}}

{{--                </a>--}}
{{--            </div>--}}
{{--            @endforeach--}}

{{--          </div>--}}
{{--        </div>--}}
