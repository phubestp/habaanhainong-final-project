package ku.cs.habaanhainong.controller;

import ku.cs.habaanhainong.entity.UserInfoRequest;
import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.ModelAttribute;
import org.springframework.web.bind.annotation.PostMapping;
import org.springframework.web.bind.annotation.RequestParam;

import java.util.Map;

@Controller
public class SignupInfoController {
    @GetMapping("/register-info")
    public String getSignupInfoPage() {
        return "registerInfo"; // return หน้าฟอร์ม signup.html
    }

    @PostMapping("/register-info")
    public String signupUserInfo(@RequestParam Map<String,String> params, Model model) {
        System.out.println(params);
        return "home";
    }

}
