package ku.cs.habaanhainong.controller;

import ku.cs.habaanhainong.service.AnimalTypeService;
import ku.cs.habaanhainong.service.FollowService;
import ku.cs.habaanhainong.service.PostAllService;
import org.json.JSONObject;
import org.springframework.security.core.Authentication;
import org.springframework.security.core.context.SecurityContextHolder;
import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.web.bind.annotation.PathVariable;
import org.springframework.web.bind.annotation.PostMapping;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RequestParam;

import java.util.ArrayList;
import java.util.HashMap;
import java.util.List;
import java.util.Map;

@Controller
public class PostAllController {

    private final PostAllService postAllService = new PostAllService();
    private final FollowService followService = new FollowService();

    @RequestMapping("/post-all")
    public String getAllPost(Model model){
        ArrayList<Object> allPost = (ArrayList<Object>) postAllService.getAllPost();
        ArrayList<Object> allFollower = (ArrayList<Object>) followService.getFollowersCount();
        Authentication authentication = SecurityContextHolder.getContext().getAuthentication();
        String username = authentication.getName();
        ArrayList<Object> allIsFollow = (ArrayList<Object>) followService.getIsFollowPosts(username);
        model.addAttribute("username", username);
        model.addAttribute("posts", allPost);
        model.addAttribute("followers", allFollower);
        model.addAttribute("isFollows", allIsFollow);
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

    @PostMapping("/follow/{username}/{post_id}")
    public String followPost(Model model,@PathVariable String username, @PathVariable String post_id){
        followService.follow(username, post_id);
        return "redirect:/post-all";
    }

    @PostMapping("/unfollow/{username}/{post_id}")
    public String unfollowPost(Model model,@PathVariable String username, @PathVariable String post_id){
        followService.unfollow(username, post_id);
        return "redirect:/post-all";
    }
}
