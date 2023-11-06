package ku.cs.habaanhainong.controller;

import ku.cs.habaanhainong.service.PostAllService;
import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RequestParam;

import java.util.ArrayList;
import java.util.Map;

@Controller
@RequestMapping("/admin")
public class PostManagementController {

    private final PostAllService postAllService = new PostAllService();

    @RequestMapping("/post-management")
    public String getAllPost(Model model){
        ArrayList<Object> allPost = (ArrayList<Object>) postAllService.getAllPost();
        model.addAttribute("posts", allPost);
        return "post-manage";
    }

    @RequestMapping("/post-management/read-post")
    public String readPost(Model model, @RequestParam Map<String,String> params){
        String post_id = params.get("post_id");
        return "redirect:/post-view/" + post_id;
    }

//    @DeleteMapping("post-manage/delete-post")
//    public String deletePost(Model model, @RequestParam Map<String,String> params){
//        System.out.println(params);
//        String post_id = params.get("post_id");
//        return "post-manage";
//    }

}
