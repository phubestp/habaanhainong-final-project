package ku.cs.habaanhainong.controller;

import jakarta.servlet.http.HttpSession;
import ku.cs.habaanhainong.entity.Users;
import ku.cs.habaanhainong.service.SignupService;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.ModelAttribute;
import org.springframework.web.bind.annotation.PostMapping;
import org.springframework.web.bind.annotation.RequestParam;

import java.util.Objects;

@Controller
public class SignupController {

    @Autowired
    private SignupService signupService;

    @GetMapping("/register")
    public String getSignupPage() {
        return "register"; // return หน้าฟอร์ม signup.html
    }

    @PostMapping("/register")
    public String signupUser(@ModelAttribute Users users, Model model, HttpSession httpSession,
    @RequestParam String password, @RequestParam String confirmPassword) {

        if (signupService.isUsernameAvailable(users.getUsername())) {
            signupService.createUser(users);
            httpSession.setAttribute("users", users);
            return "redirect:/register-info";
        } else {
            model.addAttribute("signupError", "Username not available");
        }
        System.out.println(password);
        if (!Objects.equals(confirmPassword, password)) {
            model.addAttribute("signupError", "Password don't match");
        }

        // return หน้าฟอร์ม register.html เช่นกัน แต่จะมี message ปรากฎ
        return null;
    }

}
