package ku.cs.habaanhainong.controller;

import ku.cs.habaanhainong.service.AnimalService;
import ku.cs.habaanhainong.service.PostService;
import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.PathVariable;
import org.springframework.web.bind.annotation.RequestMapping;

import java.util.ArrayList;
import java.util.HashMap;

@Controller
@RequestMapping("/post-view")
public class PostController {

    private final PostService postService = new PostService();

    @GetMapping("/{post_id}")
    public String getPostFromId(Model model, @PathVariable String post_id) {
        System.out.println("Here");
        System.out.println(post_id);
        HashMap<String, Object> post = postService.getPostFromId(post_id);
        model.addAttribute("post",post.get("post"));
        model.addAttribute("animal",post.get("animal"));
        return "post-view";
    }

}
