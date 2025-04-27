# 1. Chi tiết chức năng theo từng người dùng

## 1. Học sinh (User chính)

**Quản lý tài khoản**

- Đăng ký tài khoản bằng email/số điện thoại
- Đăng nhập, đăng xuất, khôi phục mật khẩu
- Tham gia lớp học thông qua mã lớp giáo viên cung cấp
- Cập nhật thông tin cá nhân, ảnh đại diện
- Theo dõi lịch sử học tập và làm bài

**Ôn tập**
- Truy cập kho tài liệu học tập/ôn tập theo môn học
- Làm bài tập theo chương/bài

**Thi thử**

- Làm đề thi thử có giới hạn thời gian
- Tham gia các kỳ thi theo lịch của giáo viên
- Xem kết quả và phân tích sai sót
- So sánh điểm số với các lần thi trước/với bạn bè

**Thống kê & Ranking**

- Theo dõi tiến độ học tập qua biểu đồ
- Theo dõi thứ hạng các học sinh trong lớp, đua top 1

## 2. Giáo viên

**Quản lý lớp học**

- Tạo lớp học mới và mã lớp
- Quản lý danh sách học sinh
- Chia nhóm học sinh trong lớp
- Gửi thông báo đến lớp/nhóm/cá nhân

**Quản lý câu hỏi**

- Tạo câu hỏi trắc nghiệm với nhiều định dạng
- Thêm hình ảnh, công thức toán học vào câu hỏi

**Quản lý đề thi**

- Tạo đề thi thủ công (chọn từng câu hỏi trên trang chủ web)
- Thiết lập thời gian, số lượng câu, trọng số điểm


**Giám sát học tập**

- Theo dõi tiến độ học tập của lớp/cá nhân
- Xem thống kê kết quả bài tập/bài thi

**Đánh giá & Phản hồi**

- Chấm điểm tự động các bài thi trắc nghiệm
- Gửi phản hồi cá nhân cho học sinh

**Quản lý tài liệu**

- Tải lên tài liệu học tập
- Gửi tài liệu cho học sinh
- Chia sẻ tài liệu với giáo viên khác

## 3. Giáo viên cấp cao (Admin)

- Quản lý tài khoản giáo viên trong bộ môn
- Quản lý và phê duyệt nội dung chung của bộ môn
- Quản lý cấu trúc chương trình học
- Xem thống kê tổng quan về hoạt động hệ thống

## 4 Một số tính năng thêm nếu dư thời gian
## 1. Học sinh

### Ôn tập
- Tạo bộ sưu tập câu hỏi yêu thích/khó
- Xem giải thích chi tiết sau mỗi câu hỏi

### Tương tác xã hội
- Tham gia diễn đàn thảo luận
- Đặt câu hỏi và trả lời câu hỏi của bạn học
- Tạo/tham gia nhóm học tập
- Chia sẻ tài liệu và đề thi tự tạo

### Đánh giá & Phản hồi
- Thêm nhận xét vào bài làm của học sinh
- Tạo báo cáo đánh giá định kỳ

### Thống kê & Ranking
- Xem phân tích điểm mạnh, điểm yếu theo chủ đề
- Nhận gợi ý bài tập/tài liệu dựa trên kết quả
- Xem dự đoán điểm thi dựa trên quá trình học tập

## 2 Giáo Viên

### Quản lý đề thi
- Tạo nhiều mã đề từ một bộ câu hỏi

### Quản lý câu hỏi
- Nhập câu hỏi từ file Excel/Word
- Phân loại câu hỏi theo chương/bài

### Quản lý tài liệu
- Tổ chức thư viện tài liệu theo chủ đề
- Tạo bài giảng trực tuyến

# 2. Kế Hoạch cho từng tuần

## Tuần 1: Không thay đổi

- Phân tích yêu cầu chi tiết
- Thiết kế cơ sở dữ liệu (đơn giản hơn khi bỏ Admin)
- Xây dựng mockup giao diện
- Phân công nhiệm vụ

## Tuần 2-3: Xây dựng cơ sở dữ liệu và backend cơ bản

- Tạo cấu trúc database với chỉ 2 vai trò chính
- Xây dựng API RESTful với PHP
- Phát triển hệ thống xác thực với chỉ 3 loại tài khoản (học sinh, giáo viên,
    admin)

## Tuần 4-5: Chức năng ngân hàng câu hỏi và đề thi (Thêm

## thời gian)

- Tập trung phát triển sâu hơn vào:
    **-** Giao diện tạo câu hỏi đa dạng hơn
    **-** Khả năng nhập/xuất dữ liệu câu hỏi đa dạng

## Tuần 6-7: Hệ thống làm bài và kiểm tra (Không thay đổi)

- Xây dựng giao diện làm bài thi
- Phát triển chức năng chấm bài tự động
- Tạo trang kết quả và giải thích đáp án
- Cài đặt hệ thống bảo mật chống gian lận

## Tuần 8: Thống kê và phân tích (Mở rộng)

- Thời gian dư ra từ việc bỏ Admin có thể dùng để:
    **-** Phát triển hệ thống phân tích học tập sâu hơn


**-** Thêm biểu đồ tiến độ học tập chi tiết
**-** Xây dựng thuật toán gợi ý nội dung học tập cá nhân hóa

## Tuần 9: Diễn đàn thảo luận và UI (Tập trung hơn)

- Phát triển diễn đàn thảo luận với tính năng phong phú hơn
- Cải thiện trải nghiệm người dùng trên thiết bị mobile
- Thêm giao diện chủ đề tối/sáng và tùy chỉnh

## Tuần 10: Kiểm thử và triển khai (Không thay đổi)

- Kiểm thử toàn diện hệ thống
- Sửa lỗi và hoàn thiện ứng dụng
- Viết tài liệu hướng dẫn sử dụng
- Triển khai lên máy chủ thực tế

## Đề xuất thêm tính năng mới thay vì Admin

Với thời gian dư ra từ việc bỏ chức năng Admin, có thể cân nhắc thêm một số
tính năng sau:

1. **Hệ thống học cá nhân hóa** :
    - Gợi ý nội dung dựa trên điểm yếu của học sinh
    - Tự động điều chỉnh độ khó câu hỏi theo năng lực
2. **Chế độ thi đấu** :
    - Tạo phòng thi đấu trực tuyến giữa các học sinh
    - Bảng xếp hạng và hệ thống điểm thưởng
3. **Tích hợp công cụ học tập** :
    - Bảng công thức thông minh
    - Công cụ vẽ đồ thị toán học
    - Giải phương trình tự động
4. **Hệ thống thông báo thông minh** :
    - Nhắc nhở lịch học và ôn tập
    - Thông báo về kỳ thi sắp tới
    - Cảnh báo về chủ đề cần ôn tập thêm
Những tính năng này sẽ tạo giá trị lớn hơn cho người dùng cuối so với việc xây
dựng một hệ thống Admin phức tạp.## Tính năng chi tiết theo luồng sử dụng


# 3. Luồng Hoạt động chính

**Luồng người dùng học sinh**

1. **Đăng nhập và khám phá**
    - Đăng nhập vào hệ thống
    - Xem bảng điều khiển cá nhân với tiến độ học tập
    - Nhận thông báo về bài tập, kỳ thi mới
    - Khám phá tài liệu và đề thi được đề xuất
2. **Ôn tập kiến thức**
    - Chọn môn học, chương, bài học
    - Xem lý thuyết và ví dụ minh họa
    - Làm bài tập theo chủ đề
    - Nhận phản hồi ngay lập tức về kết quả
3. **Luyện thi**
    - Tạo đề thi tự luyện hoặc chọn đề có sẵn
    - Làm bài trong thời gian giới hạn
    - Xem kết quả và phân tích sai sót
    - Lưu câu hỏi sai để ôn tập lại
4. **Tương tác xã hội**
    - Đặt câu hỏi trên diễn đàn
    - Tham gia thảo luận nhóm
    - Chia sẻ tài liệu học tập
    - Tạo nhóm học tập với bạn bè

**Luồng người dùng giáo viên**

1. **Quản lý nội dung giảng dạy**
    - Tạo/Nhập câu hỏi vào ngân hàng
    - Tổ chức câu hỏi theo chương trình học
    - Tạo đề thi và bài tập
    - Quản lý tài liệu giảng dạy
2. **Quản lý lớp học**
    - Tạo lớp học và mã tham gia
    - Phân công bài tập, đề thi
    - Theo dõi tiến độ học tập của lớp
    - Gửi thông báo cho học sinh
3. **Đánh giá học sinh**
    - Xem kết quả bài tập, bài thi
    - Phân tích điểm yếu của từng học sinh


# End.