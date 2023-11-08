package ku.cs.habaanhainong.controller;

import ku.cs.habaanhainong.entity.Users;
import ku.cs.habaanhainong.repository.MemberRepository;
import ku.cs.habaanhainong.service.PostAllService;
import ku.cs.habaanhainong.service.PostService;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.security.core.Authentication;
import org.springframework.security.core.context.SecurityContextHolder;
import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.ModelAttribute;

@Controller
public class MyPostController {

    private final PostAllService postAllService = new PostAllService();

    @Autowired
    private MemberRepository memberRepository;

    @GetMapping("/my-post")
    public String getMyPost(Model model){
        Authentication authentication = SecurityContextHolder.getContext().getAuthentication();
        String username = authentication.getName();
        Users users = memberRepository.findByUsername(username);
        model.addAttribute("username", username);
        model.addAttribute("user", users);
        model.addAttribute("posts", postAllService.getAllPost());
        return "my-post";
    }
}
