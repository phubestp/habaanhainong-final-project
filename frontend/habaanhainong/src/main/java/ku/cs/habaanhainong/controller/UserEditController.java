package ku.cs.habaanhainong.controller;

import ku.cs.habaanhainong.entity.Users;
import ku.cs.habaanhainong.repository.MemberRepository;
import ku.cs.habaanhainong.service.UserService;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.security.core.Authentication;
import org.springframework.security.core.context.SecurityContextHolder;
import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.web.bind.annotation.PathVariable;
import org.springframework.web.bind.annotation.PostMapping;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RequestParam;

import java.util.HashMap;

@Controller
public class UserEditController {

    @Autowired private MemberRepository memberRepository;
    private UserService userService = new UserService();
    @RequestMapping("/user-edit")
    public String getUserEdit(Model model) {
        Authentication authentication = SecurityContextHolder.getContext().getAuthentication();
        Users users = memberRepository.findByUsername(authentication.getName());
        model.addAttribute("users", users);
        return "user-edit";
    }

    @PostMapping("/user-edit")
    public String userEdit(Model model,@RequestParam HashMap<String, String> params) {
        Authentication authentication = SecurityContextHolder.getContext().getAuthentication();
        userService.editProfile(params, authentication.getName());
        return "home";
    }
}
