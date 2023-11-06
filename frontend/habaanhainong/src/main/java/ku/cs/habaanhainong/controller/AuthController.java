package ku.cs.habaanhainong.controller;

import jakarta.servlet.http.HttpServletRequest;
import jakarta.servlet.http.HttpServletResponse;
import jakarta.servlet.http.HttpSession;
import org.springframework.security.core.Authentication;
import org.springframework.security.web.authentication.logout.SecurityContextLogoutHandler;
import org.springframework.stereotype.Controller;
import org.springframework.web.bind.annotation.GetMapping;

@Controller
public class AuthController {
    @GetMapping("/login")
    public String loginView(HttpServletRequest request) {
        HttpSession session = request.getSession();
        if(session.getAttribute("users") != null) {
            return "register-info";
        }
        return "login";
    }

    @GetMapping("/logout")
    public String logout(HttpServletRequest request,
                         HttpServletResponse response,
                         Authentication auth) {


        if (auth != null){
            new SecurityContextLogoutHandler()
                    .logout(request, response, auth);
        }
        // เมื่อ logout เราสามารถกำหนดให้ไปหน้าใดก็ได้
        // แต่โดยทั่วไป ควรกลับมาที่หน้า login
        return "redirect:/login?logout";
    }
}

