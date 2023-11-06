package ku.cs.habaanhainong.controller;

import ku.cs.habaanhainong.service.AnimalService;
import ku.cs.habaanhainong.service.ApplicantService;
import ku.cs.habaanhainong.service.PostService;
import org.springframework.security.core.Authentication;
import org.springframework.security.core.context.SecurityContextHolder;
import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.web.bind.annotation.*;

import java.util.ArrayList;
import java.util.HashMap;

@Controller
public class PostController {

    private final PostService postService = new PostService();
    private final ApplicantService applicantService = new ApplicantService();

    @GetMapping("/post-view/{post_id}")
    public String getPostFromId(Model model, @PathVariable String post_id) {
        System.out.println("Here");
        System.out.println(post_id);
        Authentication authentication = SecurityContextHolder.getContext().getAuthentication();
        String username = authentication.getName();
        HashMap<String, Object> post = postService.getPostFromId(post_id);
        model.addAttribute("post",post.get("post"));
        model.addAttribute("animal",post.get("animal"));
        model.addAttribute("username", username);
        return "post-view";
    }

    @PostMapping("/applicant/{username}/{post_id}")
    public String applicant(Model model, @PathVariable String username, @PathVariable String post_id
    ,@RequestParam HashMap<String, String> params) {
        System.out.println(username + " " + post_id + " " +  params.get("reason"));
        applicantService.applicant(username, post_id, params.get("reason"));
        return "redirect:/post-view/" + post_id;
    }

}
