package ku.cs.habaanhainong.controller;

import ku.cs.habaanhainong.service.APIServices;
import ku.cs.habaanhainong.service.AnimalTypeService;
import ku.cs.habaanhainong.service.PostAllService;
import ku.cs.habaanhainong.service.PostService;
import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.web.bind.annotation.PostMapping;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RequestParam;

import java.util.ArrayList;
import java.util.HashMap;

@Controller
public class PostNewController {

    private final PostService postService = new PostService();
    private final AnimalTypeService animalTypeService  = new AnimalTypeService();

    @RequestMapping("/post-new")
    public String getPostNewPage(Model model) {
        model.addAttribute("animalTypes", animalTypeService.getAnimalTypes());
        return "post-new";
    }

    @PostMapping("/post-new")
    public String postNewPost(@RequestParam HashMap<String, String> params) {
        postService.createPost(params);
        return "post-all";
    }
}
