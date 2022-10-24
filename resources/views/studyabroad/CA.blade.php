@extends('layout.master')
@section('main')
    <div class="container">
        <div class="title-wapper">
            <h1 class="entry-title my-3">DU HỌC CANADA</h1>
        </div>

        @php
            $link = 'https://muanhamy.vn/wp-content/uploads/2020/06/cac-thanh-pho-o-canada-co-nhieu-nguoi-viet-sinh-song-3.jpg';
            if ($country_image = Storage::get('admin/image/' . $country->image)) {
                $link = 'data:image/jpeg;base64, ' . base64_encode($country_image);
            }
        @endphp
        <div class="container-fluid d-flex justify-content-center">
            <div class="img-inner">
                <img src="{{ $link }}" alt="">
            </div>
        </div>
        <div class="col-md-12 ">
            <div class="wpb_wrapper">
                {!! $country->description !!}
            </div>
        </div>

        <div class="col-md-12">
            <div class="title-wapper">
                <h1 class="entry-title my-3">CÁC CHƯƠNG TRÌNH HỌC DÀNH CHO SINH VIÊN QUỐC TẾ</h1>
            </div>
            <div class="col-inner">
                <p>Canada là một quốc gia phát triển về cả kinh tế và giáo dục. Nhưng học phí, sinh hoạt phí không cao. Nếu so sánh thì học phí chỉ cao hơn các trường quốc tế ở Việt Nam một chút. Và phí sinh hoạt chỉ cao hơn những gia đình khá giả một chút. Quan trọng nhất, bạn có cơ hội du học định cư Canada. Chỉ cần bạn học tập tốt, được ký hợp đồng lao động, chăm chỉ cống hiến, không vi phạm pháp luật thì tỉ lệ định cư là 100%</p>
                <p>Dưới đây là chi phí du học Canada trung bình giữa các vùng.</p>
                <h4><em>Học phí du học canada:</em></h4>
                <table class="table table-bordered" style="width: 100%;border:3px">
                    <tbody>
                    <tr>
                    <td width="229"><strong>Tên trường</strong></td>
                    <td width="239"><strong>Chính sách học phí</strong></td>
                    <td width="239"><strong>Chuyên ngành nổi bật</strong></td>
                    </tr>

                    @if (!empty($country->schools))
                    @foreach ($country->schools as $school)
                        <tr>
                            <td><span style="font-weight: 400;">{{ $school->name }}</span></td>
                            <td><span style="font-weight: 400;">17.884 – 17.884</span></td>
                            <td><span style="font-weight: 400;">{{ $school->majors->implode('name', ', ') }}</span></td>
                        </tr>
                    @endforeach
                @else

                    <tr>
                    <td width="229">Algoma University</td>
                    <td width="239">18.287 – 18.287</td>
                    <td width="239"></td>
                    </tr>
                    <tr>
                    <td width="229">Athabasca University (PT only)</td>
                    <td width="239">14.330 – 15.290</td>
                    <td width="239">15.500 – 15.500</td>
                    </tr>
                    <tr>
                    <td width="229">Bishop’s University</td>
                    <td width="239">17.530 – 19.581</td>
                    <td width="239">17.530 – 17.530<sup> </sup></td>
                    </tr>
                    <tr>
                    <td width="229">Brandon University</td>
                    <td width="239">9.341 – 14.685</td>
                    <td width="239">4.280 – 5.992<sup> </sup></td>
                    </tr>
                    <tr>
                    <td width="229">Brock University</td>
                    <td width="239">26.558 – 26.558</td>
                    <td width="239">23.504 – 23.504</td>
                    </tr>
                    <tr>
                    <td width="229">Cape Breton University</td>
                    <td width="239">16.080 – 16.080</td>
                    <td width="239">18.100 – 18.100<sup> </sup></td>
                    </tr>
                    <tr>
                    <td width="229">Carleton University</td>
                    <td width="239">25.503 – 33.757</td>
                    <td width="239">13.060 – 15.800</td>
                    </tr>
                    <tr>
                    <td width="229">Concordia University</td>
                    <td width="239">17.530 – 19.581</td>
                    <td width="239">11.728 – 13.148</td>
                    </tr>
                    <tr>
                    <td width="229">Dalhousie University</td>
                    <td width="239">17.661 – 19.134</td>
                    <td width="239">18.126 – 19.599</td>
                    </tr>
                    <tr>
                    <td width="229">Institut national de la recherche scientifique</td>
                    <td width="239"><sup> </sup></td>
                    <td width="239">15.876 – 17.658<sup> </sup></td>

                    </tr>
                    <tr>
                    <td width="229">Kwantlen Polytechnic University</td>
                    <td width="239">19.741 – 19.741</td>
                    <td width="239"><sup> </sup></td>
                    </tr>
                    <tr>
                    <td width="229">Lakehead University</td>
                    <td width="239">23.731 – 23.731</td>
                    <td width="239">14.934 – 14.934</td>
                    </tr>
                    <tr>
                    <td width="229">Laurentian University (includes Hearst University)</td>
                    <td width="239">25.309 – 25.960</td>
                    <td width="239">12.961 – 14.361</td>
                    </tr>
                    <tr>
                    <td width="229">MacEwan University</td>
                    <td width="239">18.240 – 21.888</td>
                    <td width="239"><sup> </sup></td>
                    </tr>
                    <tr>
                    <td width="229">McGill University</td>
                    <td width="239">17.421 – 20.229</td>
                    <td width="239">15.637 – 18.110</td>
                    </tr>
                    <tr>
                    <td width="229">McMaster University</td>
                    <td width="239">26.981 – 30.744</td>
                    <td width="239">16.761 – 17.096</td>
                    </tr>
                    <tr>
                    <td width="229">Memorial University of Newfoundland</td>
                    <td width="239">11.460 – 11.460</td>
                    <td width="239">3.222 – 4.833</td>
                    </tr>
                    <tr>
                    <td width="229">Mount Allison University</td>
                    <td width="239">18.130 – 18.130</td>
                    <td width="239"></td>
                    </tr>
                    <tr>
                    <td width="229">Mount Royal University</td>
                    <td width="239">19.463 – 19.463</td>
                    <td width="239"><sup> </sup></td>
                    </tr>
                    <tr>
                    <td width="229">Mount Saint Vincent University</td>
                    <td width="239">15.864 – 15.864</td>
                    <td width="239">10.722 – 10.722</td>
                    </tr>
                    <tr>
                    <td width="229">Nipissing University</td>
                    <td width="239">19.325 – 19.325</td>
                    <td width="239">18.350 – 18.350</td>
                    </tr>
                    @endif
                    </tbody>
                    </table>
                <h4><em>Sinh hoạt phí ở Canada:</em></h4>
                <ul>
                    <li>Ký túc xá đã bao gồm tiền điện, nước: 600 – 900 CAD/tháng</li>
                    <li>Homestay đã bao gồm tiền điện, nước, internet, ăn uống: 500 – 750 CAD/tháng</li>
                    <li>Tiền thuê nhà đã bao gồm điện, nước, internet: 300 – 450 CAD/tháng</li>
                    <li>Phí điện thoại: 20 &#8211; 60 CAD/ tháng</li>
                    <li>Tiền ăn uống:150 &#8211; 250 CAD/ tháng</li>
                    <li>Phí Internet: 55 – 95 CAD/tháng</li>
                    <li>Phí đi lại: 2.75 CAD/ lượt và 65 CAD/ tháng</li>
                    <li>Giải trí: 100 CAD/ tháng</li>
                </ul>
            </div>
        </div>
        <div class="col-md-12">
            <div class="title-wapper">
                <h1 class="entry-title my-3">5. VIỆC LÀM THÊM CỦA DU HỌC SINH TẠI CANADA</h1>
            </div>
            <div class="col-inner">
                <p style="text-align: justify">Trên thị thực du học Canada quy định bạn được phép làm việc 20 giờ/tuần đối với công việc được trả lương. Tuy nhiên, đây là số giờ tối đa và bạn có thể tự do làm việc với số giờ ít hơn. Thông thường, những sinh viên đăng ký các khóa học khó hoặc chuyên sâu được các trường đại học khuyến nghị làm việc tối đa 12 giờ/tuần. Điều này là do làm việc nhiều hơn con số này có thể ảnh hưởng đến kết quả học tập của học sinh. Vì vậy, bạn có thể giảm số giờ làm việc nếu cảm thấy không thể duy trì sự cân bằng giữa công việc &#8211; học tập và cuộc sống.</p>
                <p style="text-align: justify">Tất cả các trường cao đẳng và đại học đều có bảng thông báo quảng cáo việc làm trong khuôn viên trường. Cũng sẽ có các trang web cung cấp thông tin về việc làm tương tự.</p>
                <p style="text-align: justify">Bạn có thể làm việc trong quán cà phê, nhà hàng; các cửa hàng bán lẻ như cửa hàng quần áo hoặc đồ thể thao; nhân viên cứu hộ hoặc người hướng dẫn bơi lội tại bể bơi của trường đại học hoặc bãi biển; hiệu sách, thư viện&#8230; Nếu bạn biết nhiều thứ tiếng, bạn có thể làm công việc dịch thuật. Vì Canada là một xã hội đa văn hóa, các dịch vụ của một phiên dịch viên được yêu cầu rộng rãi.</p>
                <p style="text-align: justify">Mức lương cho công việc bán thời gian có thể thay đổi tùy theo công việc họ nhận được. Giống như mức lương trung bình cho một công việc bán thời gian có thể là 22 CAD/giờ, tuy nhiên, sinh viên được trả theo giờ cho công việc bán thời gian vào khoảng 10 CAD/giờ. Ngoài ra, mức lương cho công việc bán thời gian có thể khác nhau giữa các thành phố.</p>
                <table class="table table-bordered" style="width: 100%; border:3px">
                <tbody>
                <tr>
                <td width="468"><strong>Công việc bán thời gian</strong></td>
                <td width="468"><strong>Mức lương / Tiền công (tính bằng CAD/giờ)</strong></td>
                </tr>
                <tr>
                <td width="468">Đại diện bộ phận dịch vụ khách hàng</td>
                <td width="468">14</td>
                </tr>
                <tr>
                <td width="468">Nấu ăn</td>
                <td width="468">13-15</td>
                </tr>
                <tr>
                <td width="468">Nhân viên bán hàng</td>
                <td width="468">15</td>
                </tr>
                <tr>
                <td width="468">Cộng tác viên bán hàng</td>
                <td width="468">12</td>
                </tr>
                <tr>
                <td width="468">Giáo viên</td>
                <td width="468">20-22</td>
                </tr>
                <tr>
                <td width="468">Nhà thiết kế web</td>
                <td width="468">20</td>
                </tr>
                <tr>
                <td width="468">Người bán hàng</td>
                <td width="468">13</td>
                </tr>
                </tbody>
                </table>
            </div>
        </div>

        <div class="col-md-12">
            <div class="title-wapper">
                <h1 class="entry-title my-3"> DU HỌC CANADA QUA TRUNG TÂM TƯ VẤN DU HỌC, NÊN HAY KHÔNG?</h1>
            </div>
            <div class="col-inner">
                <p style="text-align: justify">Với nhiều năm kinh nghiệm trong lĩnh vực tư vấn du học Canada, cùng đội ngũ chuyên viên tư vấn chuyên nghiệp, có trình độ chuyên môn cao, lựa chọn du học Canada qua các trung tâm tư vấn du học, phụ huynh và học sinh sẽ nhận được nhiều giá trị như:</p>
                <h3 style="text-align: justify">Lộ trình học tập rõ ràng, phù hợp</h3>
                <p style="text-align: justify">Đến với trung tâm tư vấn du học Canada, các chuyên viên tư vấn sẽ lắng nghe nguyện vọng của phụ huynh và học sinh, sau đó sẽ cùng nhau trao đổi để có thể xác định được trường học, ngành học tốt nhất để nâng cao trình độ học tập của học sinh. Đồng thời, Chúng tôi cũng giúp học sinh lên kế hoạch học tập rõ ràng, phù hợp, đảm bảo học sinh sẽ trải qua một quá trình học tập không phức tạp tại trường đại học đã lựa chọn.</p>
                <h3 style="text-align: justify">Tiết kiệm thời gian chuẩn bị hồ sơ</h3>
                <p style="text-align: justify">Lựa chọn đặt niềm tin vào các trung tâm tư vấn du học Canada đồng nghĩa với việc thay vì phải tự mình chuẩn bị hàng tá giấy tờ cần thiết cho hồ sơ du học, hay tự mình tìm kiếm thông tin qua nhiều nguồn khác nhau, đôi khi mất nhiều thời gian nhưng vẫn không đầy đủ và hiệu quả thì công việc phức tạp đó đã có trung tâm lo. Nhờ vậy, phụ huynh và học sinh tiết kiệm được nhiều thời gian và công sức để chuẩn bị cho những việc khác.</p>
                <h3 style="text-align: justify">Thông tin đầy đủ, chính xác và cập nhật liên tục</h3>
                <p style="text-align: justify">Các trung tâm tư vấn du học luôn nhanh nhạy trong vấn đề liên quan đến du học tại Anh như: điều kiện nộp đơn nhập học, học bổng tại các trường, các thông tin mới về chính sách visa, chuẩn bị hồ sơ, cơ hội việc làm, cơ hội định cư… Vì vậy, họ sẽ cung cấp cho phụ huynh và học sinh nhưng thông tin chi tiết, những phân tích thấu đáo, những tư vấn hiệu quả về việc lựa chọn trường học nào dựa trên khả năng học tập của từng học sinh cũng như điều kiện kinh tế của từng gia đình.</p>
                <p style="text-align: justify">Không chỉ vậy, các trung tâm du học Canada thường là đại diện tuyển sinh chính thức của các trường học tại Canada. Cho nên, phụ huynh và học sinh sẽ có cơ hội trực tiếp tham gia các buổi hội thảo, nơi đại diện tuyển sinh của các trường cung cấp thông tin về các chương trình học và giải đáp các câu hỏi xung quanh việc học tập tại trường. Qua các buổi tư vấn trực tiếp, phụ huynh và học sinh sẽ được cung cấp và cập nhật các thông tin du học mới nhất.</p>
                <p style="text-align: justify">Chưa hết, trong suốt quá trình học tập của học sinh, sinh viên tại Canada, các trung tâm luôn duy trì các chính sách ưu đãi và hỗ trợ tư vấn cho phụ huynh cũng như học sinh, sinh viên. Trong trường hợp phụ huynh muốn sang thăm con em mình, trung tâm sẽ hỗ trợ đắc lực trong việc xin visa, thu xếp chỗ ở, đi lại, giúp các gia đình tiết kiệm được công sức, thời gian và tiền  bạc.</p>
                <p style="text-align: justify">KINGSTUDY là đơn vị hàng đầu trong lĩnh vực tư vấn du học Canada trên toàn quốc. Chúng tôi có một đội ngũ các chuyên gia có trình độ chuyên môn cao, các Cố vấn chuyên nghiệp và các tư vấn viên được đào tạo có thể hướng dẫn sinh viên chọn trường Đại học, khóa học chuyên ngành và hướng dẫn chỗ ở phù hợp với sinh viên.</p>
                <p style="text-align: justify">Chúng tôi không chỉ là cầu nối giữa sinh viên và các trường Đại học, mà Chúng tôi còn được công nhận để định hình sự nghiệp của những người khao khát. Đặt niềm tin vào Chúng tôi, bạn sẽ nhận chất lượng dịch vụ hàng đầu, quy trình nhập học nhanh nhất cho học viên và những hỗ trợ tốt nhất trong suốt quá trình du học Canada của học sinh.</p>
            </div>
        </div>
    </div>
@endsection

