package ku.cs.habaanhainong.controller;

import ku.cs.habaanhainong.service.AnimalTypeService;
import ku.cs.habaanhainong.service.PostAllService;
import org.json.JSONObject;
import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RequestParam;

import java.util.ArrayList;
import java.util.HashMap;
import java.util.Map;

@Controller
public class PostAllController {

    private final PostAllService postAllService = new PostAllService();

    @RequestMapping("/post-all")
    public String getAllPost(Model model){
        ArrayList<Object> allPost = (ArrayList<Object>) postAllService.getAllPost();
        model.addAttribute("posts", allPost);
        return "post-all";
    }

    @RequestMapping("post-all/read-post")
    public String readPost(Model model, @RequestParam Map<String,String> params){
        System.out.println("There");
//        JSONObject jsonObject = new JSONObject();
//        jsonObject.put("", params.get(""));
//        model.addAttribute("");
        String post_id = params.get("post_id");
        System.out.println(params);
        System.out.println(post_id);
        return "redirect:/post-view/" + post_id;
    }
}
