package ku.cs.habaanhainong.controller;

import ku.cs.habaanhainong.service.AnimalService;
import ku.cs.habaanhainong.service.AnimalTypeService;
import ku.cs.habaanhainong.service.PostService;
import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.web.bind.annotation.PathVariable;
import org.springframework.web.bind.annotation.PostMapping;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RequestParam;

import java.util.HashMap;

@Controller
public class PostEditController {

    private final PostService postService = new PostService();
    private final AnimalTypeService animalTypeService  = new AnimalTypeService();

    @RequestMapping("/post-edit/{post_id}")
    public String getPostNewPage(Model model, @PathVariable String post_id) {
        HashMap<String, Object> post = postService.getPostFromId(post_id);
        model.addAttribute("post", post.get("post"));
        model.addAttribute("animal", post.get("animal"));
        System.out.println(post.get("animal"));
        System.out.println(post.get("post"));
        model.addAttribute("animalTypes", animalTypeService.getAnimalTypes());
        return "post-edit";
    }

    @PostMapping("/post-edit/{post_id}/{animal_id}")
    public String updatePost(@RequestParam HashMap<String, String> params,@PathVariable String post_id, @PathVariable String animal_id) {
        postService.updatePost(params, post_id, animal_id);
        return "post-all";
    }
}
