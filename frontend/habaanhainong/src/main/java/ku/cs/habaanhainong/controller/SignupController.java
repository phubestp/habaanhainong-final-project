package ku.cs.habaanhainong.controller;

import ku.cs.habaanhainong.entity.UserInfoRequest;
import ku.cs.habaanhainong.entity.Users;
import ku.cs.habaanhainong.service.SignupService;
import org.modelmapper.ModelMapper;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.security.core.context.SecurityContextHolder;
import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.ModelAttribute;
import org.springframework.web.bind.annotation.PostMapping;
import org.springframework.web.bind.annotation.RequestParam;
import org.springframework.web.client.RestTemplate;

@Controller
public class SignupController {

    @Autowired
    private SignupService signupService;

    @GetMapping("/register")
    public String getSignupPage() {
        return "register"; // return หน้าฟอร์ม signup.html
    }

    @PostMapping("/register")
    public String signupUser(@ModelAttribute Users users, Model model) {

        if (signupService.isUsernameAvailable(users.getUsername())) {
            signupService.createUser(users);
            return "registerInfo";
        } else {
            model.addAttribute("signupError", "Username not available");
        }
        // return หน้าฟอร์ม register.html เช่นกัน แต่จะมี message ปรากฎ
        return null;
    }

}
