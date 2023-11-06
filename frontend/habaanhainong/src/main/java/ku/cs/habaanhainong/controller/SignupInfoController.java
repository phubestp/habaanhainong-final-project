package ku.cs.habaanhainong.controller;

import jakarta.servlet.http.HttpServletRequest;
import jakarta.servlet.http.HttpSession;
import ku.cs.habaanhainong.entity.Users;
import ku.cs.habaanhainong.service.SignupService;
import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.web.bind.annotation.*;

import java.util.HashMap;

@Controller
public class SignupInfoController {
    @GetMapping("/register-info")
    public String getSignupInfoPage(HttpServletRequest request) {
        HttpSession session = request.getSession();
        Users users = ((Users) session.getAttribute("users"));
        if(users == null) {
            return "register";
        }
        return "register-info"; // return หน้าฟอร์ม signup.html
    }

    @PostMapping("/register-info")
    public String signupUserInfo(@RequestParam HashMap<String,String> params, Model model, HttpServletRequest request) {

        HttpSession session = request.getSession();
        Users users = ((Users) session.getAttribute("users"));

        SignupService signupService = new SignupService();
        signupService.updateUser(users, params);
        session.setAttribute("users", null);
        return "home";
    }


}
