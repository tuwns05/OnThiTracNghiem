Xin lỗi vì thiếu sót đó. Bạn nói đúng, phần mô tả chi tiết cho từng trường là rất quan trọng để hiểu rõ mục đích của chúng. Dưới đây là phiên bản cập nhật của các bảng, bao gồm cả cột "Mô tả":

**1. Bảng `Users` (Người dùng)**

| Tên Cột                 | Kiểu Dữ liệu        | Ràng buộc/Ghi chú                   | Mô tả                                               |
| :---------------------- | :------------------ | :----------------------------------- | :-------------------------------------------------- |
| `user_id`               | BIGINT              | PK, Auto Increment                   | Khóa chính định danh duy nhất cho mỗi người dùng.   |
| `email`                 | VARCHAR(255)        | UNIQUE, NOT NULL                     | Địa chỉ email dùng để đăng ký và đăng nhập.        |
| `password_hash`         | VARCHAR(255)        | NOT NULL                             | Chuỗi mật khẩu đã được mã hóa an toàn.             |
| `full_name`             | VARCHAR(100)        | NOT NULL                             | Tên đầy đủ của người dùng.                          |
| `avatar_url`            | VARCHAR(500)        | NULLABLE                             | Đường dẫn URL đến ảnh đại diện của người dùng.      |
| `role`                  | ENUM('student', 'teacher') | NOT NULL                      | Phân biệt vai trò là 'học sinh' hay 'giáo viên'.     |
| `password_reset_token`  | VARCHAR(100)        | NULLABLE                             | Token tạm thời dùng cho chức năng quên mật khẩu.    |
| `password_reset_expires`| DATETIME            | NULLABLE                             | Thời gian hết hạn của token quên mật khẩu.           |
| `created_at`            | DATETIME            | Default: CURRENT_TIMESTAMP           | Thời điểm tài khoản được tạo.                      |
| `updated_at`            | DATETIME            | Default: CURRENT_TIMESTAMP on update | Thời điểm thông tin tài khoản được cập nhật lần cuối. |

**2. Bảng `Classes` (Lớp học)**

| Tên Cột      | Kiểu Dữ liệu | Ràng buộc/Ghi chú               | Mô tả                                             |
| :----------- | :----------- | :------------------------------- | :------------------------------------------------ |
| `class_id`   | BIGINT       | PK, Auto Increment               | Khóa chính định danh duy nhất cho mỗi lớp học.    |
| `class_name` | VARCHAR(100) | NOT NULL                         | Tên của lớp học.                                  |
| `class_code` | VARCHAR(10)  | UNIQUE, NOT NULL                 | Mã duy nhất để học sinh có thể tham gia lớp học. |
| `teacher_id` | BIGINT       | FK -> Users.user_id, NOT NULL    | ID của giáo viên tạo và quản lý lớp học.         |
| `description`| TEXT         | NULLABLE                         | Mô tả chi tiết hơn về lớp học (mục tiêu, nội dung...). |
| `created_at` | DATETIME     | Default: CURRENT_TIMESTAMP       | Thời điểm lớp học được tạo.                      |

**3. Bảng `Enrollments` (Tham gia lớp học)**

| Tên Cột           | Kiểu Dữ liệu | Ràng buộc/Ghi chú               | Mô tả                                              |
| :---------------- | :----------- | :------------------------------- | :------------------------------------------------- |
| `enrollment_id`   | BIGINT       | PK, Auto Increment               | Khóa chính định danh cho mỗi lượt ghi danh.        |
| `student_id`      | BIGINT       | FK -> Users.user_id, NOT NULL    | ID của học sinh tham gia lớp học.                  |
| `class_id`        | BIGINT       | FK -> Classes.class_id, NOT NULL | ID của lớp học mà học sinh tham gia.              |
| `enrollment_date` | DATETIME     | Default: CURRENT_TIMESTAMP       | Thời điểm học sinh được ghi danh vào lớp.         |
| *(Constraint)* |              | UNIQUE (`student_id`, `class_id`) | Đảm bảo mỗi học sinh chỉ tham gia một lớp một lần. |

**4. Bảng `Subjects` (Môn học)**

| Tên Cột        | Kiểu Dữ liệu | Ràng buộc/Ghi chú | Mô tả                                        |
| :------------- | :----------- | :----------------- | :------------------------------------------- |
| `subject_id`   | INT          | PK, Auto Increment | Khóa chính định danh duy nhất cho mỗi môn học. |
| `subject_name` | VARCHAR(100) | UNIQUE, NOT NULL   | Tên của môn học (ví dụ: Toán, Vật lý...).    |

**5. Bảng `Questions` (Câu hỏi)**

| Tên Cột              | Kiểu Dữ liệu                             | Ràng buộc/Ghi chú                   | Mô tả                                                      |
| :------------------- | :--------------------------------------- | :----------------------------------- | :--------------------------------------------------------- |
| `question_id`        | BIGINT                                   | PK, Auto Increment                   | Khóa chính định danh duy nhất cho mỗi câu hỏi.             |
| `teacher_id`         | BIGINT                                   | FK -> Users.user_id, NOT NULL        | ID của giáo viên đã tạo câu hỏi này.                       |
| `subject_id`         | INT                                      | FK -> Subjects.subject_id, NULLABLE  | ID môn học liên quan (tùy chọn, để phân loại).             |
| `question_text`      | TEXT                                     | NOT NULL                             | Nội dung đầy đủ của câu hỏi (có thể chứa mã HTML/LaTeX).    |
| `question_type`      | ENUM('single_choice', 'multiple_choice', ...) | NOT NULL                          | Loại câu hỏi (chọn một, chọn nhiều, điền khuyết...).      |
| `image_url`          | VARCHAR(500)                             | NULLABLE                             | Đường dẫn URL đến hình ảnh minh họa cho câu hỏi.             |
| `audio_url`          | VARCHAR(500)                             | NULLABLE                             | Đường dẫn URL đến file âm thanh (hữu ích cho môn ngoại ngữ). |
| `math_formula_latex` | TEXT                                     | NULLABLE                             | Lưu trữ công thức toán học dưới dạng mã LaTeX.              |
| `created_at`         | DATETIME                                 | Default: CURRENT_TIMESTAMP           | Thời điểm câu hỏi được tạo.                               |
| `updated_at`         | DATETIME                                 | Default: CURRENT_TIMESTAMP on update | Thời điểm câu hỏi được cập nhật lần cuối.                   |

**6. Bảng `QuestionOptions` (Các lựa chọn cho câu hỏi)**

| Tên Cột         | Kiểu Dữ liệu | Ràng buộc/Ghi chú                   | Mô tả                                                |
| :-------------- | :----------- | :----------------------------------- | :--------------------------------------------------- |
| `option_id`     | BIGINT       | PK, Auto Increment                   | Khóa chính định danh duy nhất cho mỗi lựa chọn.      |
| `question_id`   | BIGINT       | FK -> Questions.question_id, NOT NULL| ID của câu hỏi mà lựa chọn này thuộc về.             |
| `option_text`   | TEXT         | NOT NULL                             | Nội dung của phương án lựa chọn (có thể chứa LaTeX). |
| `is_correct`    | BOOLEAN      | NOT NULL, Default: false             | Đánh dấu `true` nếu đây là đáp án đúng.              |
| `display_order` | INT          | NULLABLE                             | Thứ tự hiển thị của lựa chọn này (nếu cần thiết lập). |

**7. Bảng `Tests` (Đề thi / Bài tập)**

| Tên Cột            | Kiểu Dữ liệu               | Ràng buộc/Ghi chú                   | Mô tả                                                          |
| :----------------- | :------------------------- | :----------------------------------- | :------------------------------------------------------------- |
| `test_id`          | BIGINT                     | PK, Auto Increment                   | Khóa chính định danh duy nhất cho mỗi đề thi/bài tập.          |
| `class_id`         | BIGINT                     | FK -> Classes.class_id, NOT NULL     | ID của lớp học mà đề thi/bài tập này được giao.                |
| `teacher_id`       | BIGINT                     | FK -> Users.user_id, NOT NULL        | ID của giáo viên đã tạo đề thi/bài tập này.                    |
| `title`            | VARCHAR(255)               | NOT NULL                             | Tiêu đề của đề thi/bài tập.                                   |
| `description`      | TEXT                       | NULLABLE                             | Mô tả chi tiết hơn hoặc hướng dẫn cho đề thi/bài tập.          |
| `test_type`        | ENUM('exam', 'exercise')   | NOT NULL                             | Phân loại là 'bài thi' (thường có giới hạn thời gian) hay 'bài tập' (ôn luyện). |
| `time_limit_minutes`| INT                      | NULLABLE                             | Thời gian làm bài cho phép (tính bằng phút). NULL nếu không giới hạn. |
| `start_time`       | DATETIME                   | NULLABLE                             | Thời điểm sớm nhất học sinh có thể bắt đầu làm bài (quan trọng cho thi). |
| `end_time`         | DATETIME                   | NULLABLE                             | Thời điểm cuối cùng học sinh có thể nộp bài (quan trọng cho thi). |
| `creation_method`  | ENUM('manual', 'random')   | NOT NULL                             | Cách tạo đề: 'thủ công' (giáo viên chọn câu) hay 'ngẫu nhiên' (hệ thống tự chọn). |
| `total_questions`  | INT                        | NOT NULL                             | Tổng số câu hỏi có trong đề thi/bài tập.                      |
| `max_score`        | DECIMAL(5,2)               | NOT NULL                             | Tổng điểm tối đa có thể đạt được cho đề thi/bài tập.          |
| `created_at`       | DATETIME                   | Default: CURRENT_TIMESTAMP           | Thời điểm đề thi/bài tập được tạo.                           |
| `updated_at`       | DATETIME                   | Default: CURRENT_TIMESTAMP on update | Thời điểm đề thi/bài tập được cập nhật lần cuối.              |

**8. Bảng `TestQuestions` (Chi tiết câu hỏi trong một đề thi)**

| Tên Cột            | Kiểu Dữ liệu | Ràng buộc/Ghi chú                   | Mô tả                                                               |
| :----------------- | :----------- | :----------------------------------- | :------------------------------------------------------------------ |
| `test_question_id` | BIGINT       | PK, Auto Increment                   | Khóa chính định danh mối liên kết giữa câu hỏi và đề thi cụ thể.     |
| `test_id`          | BIGINT       | FK -> Tests.test_id, NOT NULL        | ID của đề thi chứa câu hỏi này.                                     |
| `question_id`      | BIGINT       | FK -> Questions.question_id, NOT NULL| ID của câu hỏi được sử dụng trong đề thi này.                        |
| `point_value`      | DECIMAL(5,2) | NOT NULL, Default: 1.0               | Số điểm/trọng số của câu hỏi này trong đề thi cụ thể.               |
| `display_order`    | INT          | NULLABLE                             | Thứ tự xuất hiện của câu hỏi này trong đề thi (nếu cần thiết lập). |

**9. Bảng `StudentSubmissions` (Bài nộp của Học sinh)**

| Tên Cột           | Kiểu Dữ liệu                             | Ràng buộc/Ghi chú                        | Mô tả                                                            |
| :---------------- | :--------------------------------------- | :---------------------------------------- | :--------------------------------------------------------------- |
| `submission_id`   | BIGINT                                   | PK, Auto Increment                        | Khóa chính định danh duy nhất cho mỗi lượt nộp bài.             |
| `test_id`         | BIGINT                                   | FK -> Tests.test_id, NOT NULL             | ID của đề thi/bài tập mà bài nộp này tương ứng.                 |
| `student_id`      | BIGINT                                   | FK -> Users.user_id, NOT NULL             | ID của học sinh đã thực hiện bài nộp này.                      |
| `start_timestamp` | DATETIME                                 | NOT NULL                                  | Thời điểm chính xác học sinh bắt đầu làm bài.                    |
| `end_timestamp`   | DATETIME                                 | NULLABLE                                  | Thời điểm học sinh nộp bài hoặc thời điểm hết giờ làm bài.       |
| `score`           | DECIMAL(5,2)                             | NULLABLE                                  | Điểm số cuối cùng học sinh đạt được (sẽ được cập nhật sau khi chấm). |
| `status`          | ENUM('in_progress', 'submitted', 'graded') | NOT NULL, Default: 'in_progress'          | Trạng thái của bài nộp: đang làm, đã nộp, đã chấm điểm.         |
| `submitted_at`    | DATETIME                                 | NULLABLE                                  | Thời điểm chính xác học sinh nhấn nút "Nộp bài".                 |
| `teacher_feedback`| TEXT                                     | NULLABLE                                  | Nhận xét hoặc phản hồi của giáo viên về bài nộp cụ thể này.     |

**10. Bảng `StudentAnswers` (Câu trả lời chi tiết của Học sinh)**

| Tên Cột              | Kiểu Dữ liệu | Ràng buộc/Ghi chú                           | Mô tả                                                                      |
| :------------------- | :----------- | :------------------------------------------- | :------------------------------------------------------------------------- |
| `answer_id`          | BIGINT       | PK, Auto Increment                           | Khóa chính định danh duy nhất cho mỗi câu trả lời của học sinh.            |
| `submission_id`      | BIGINT       | FK -> StudentSubmissions.submission_id, NOT NULL | ID của bài nộp mà câu trả lời này thuộc về.                                |
| `test_question_id`   | BIGINT       | FK -> TestQuestions.test_question_id, NOT NULL | ID của câu hỏi cụ thể trong đề thi mà học sinh đang trả lời.                 |
| `selected_option_id` | BIGINT       | FK -> QuestionOptions.option_id, NULLABLE    | ID của phương án lựa chọn mà học sinh đã chọn (cho câu trắc nghiệm). NULL nếu bỏ qua. |
| `answer_text`        | TEXT         | NULLABLE                                     | Nội dung câu trả lời của học sinh (dùng cho các loại câu hỏi tự luận, điền khuyết...). |
| `is_correct`         | BOOLEAN      | NULLABLE                                     | Đánh dấu `true`/`false` sau khi chấm để biết câu trả lời này đúng hay sai. |
*Ghi chú: Cần bảng `StudentAnswer_SelectedOptions` riêng nếu hỗ trợ chọn nhiều đáp án.*

**11. Bảng `LearningMaterials` (Tài liệu học tập)**

| Tên Cột       | Kiểu Dữ liệu | Ràng buộc/Ghi chú                   | Mô tả                                                              |
| :------------ | :----------- | :----------------------------------- | :----------------------------------------------------------------- |
| `material_id` | BIGINT       | PK, Auto Increment                   | Khóa chính định danh duy nhất cho mỗi tài liệu.                    |
| `teacher_id`  | BIGINT       | FK -> Users.user_id, NOT NULL        | ID của giáo viên đã tải lên hoặc chia sẻ tài liệu này.              |
| `class_id`    | BIGINT       | FK -> Classes.class_id, NOT NULL     | ID của lớp học mà tài liệu này được chia sẻ cho.                   |
| `subject_id`  | INT          | FK -> Subjects.subject_id, NULLABLE  | ID môn học liên quan (tùy chọn, để phân loại).                     |
| `title`       | VARCHAR(255) | NOT NULL                             | Tiêu đề của tài liệu học tập.                                      |
| `description` | TEXT         | NULLABLE                             | Mô tả chi tiết hơn về nội dung hoặc cách sử dụng tài liệu.         |
| `file_url`    | VARCHAR(500) | NOT NULL                             | Đường dẫn URL để truy cập/tải về file tài liệu (hoặc link ngoài). |
| `file_type`   | VARCHAR(50)  | NULLABLE                             | Loại file (ví dụ: pdf, docx, mp4, jpg, url...) để xử lý hiển thị. |
| `uploaded_at` | DATETIME     | Default: CURRENT_TIMESTAMP           | Thời điểm tài liệu được tải lên hệ thống.                          |

**12. Bảng `Announcements` (Thông báo)**

| Tên Cột                | Kiểu Dữ liệu | Ràng buộc/Ghi chú                   | Mô tả                                                                 |
| :--------------------- | :----------- | :----------------------------------- | :-------------------------------------------------------------------- |
| `announcement_id`      | BIGINT       | PK, Auto Increment                   | Khóa chính định danh duy nhất cho mỗi thông báo.                      |
| `teacher_id`           | BIGINT       | FK -> Users.user_id, NOT NULL        | ID của giáo viên gửi thông báo.                                        |
| `class_id`             | BIGINT       | FK -> Classes.class_id, NOT NULL     | ID của lớp học mà thông báo này được gửi tới.                         |
| `recipient_student_id` | BIGINT       | FK -> Users.user_id, NULLABLE        | ID của học sinh cụ thể nhận thông báo (NULL nếu gửi cho cả lớp).        |
| `title`                | VARCHAR(255) | NOT NULL                             | Tiêu đề của thông báo.                                                |
| `content`              | TEXT         | NOT NULL                             | Nội dung chi tiết của thông báo.                                      |
| `created_at`           | DATETIME     | Default: CURRENT_TIMESTAMP           | Thời điểm thông báo được tạo và gửi đi.                                |
| `is_read`              | BOOLEAN      | Default: false                       | Trạng thái đã đọc (cần cân nhắc dùng bảng riêng để theo dõi từng HS). |

*Ghi chú: Có thể cần bảng `AnnouncementReadStatus(announcement_id, student_id)` để theo dõi trạng thái đọc chi tiết của từng học sinh.*

Link sơ đồ diagram cho cơ sở dữ liệu: [Diagram](https://dbdiagram.io/d/onthitracnghi-68160fa91ca52373f54ef56a)