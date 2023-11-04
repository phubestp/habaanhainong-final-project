package ku.cs.habaanhainong.entity;

import lombok.Data;

@Data
public class UserInfoRequest {
    private String firstname;
    private String lastname;

    private String phone_no;
    private String instagram;
    private String facebook;
    private String line;

}
