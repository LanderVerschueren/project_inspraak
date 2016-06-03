using UnityEngine;
using System.Collections;
using UnityEngine.UI;
using System.Collections.Generic;

public class ProjectScroll : MonoBehaviour {
  public Scrollbar projectScroll;
  private int totalProjects;
  private List<float> scrollList;

	// Use this for initialization
	public void Start () 
  {
    projectScroll.numberOfSteps = totalProjects;
    /*totalProjects = LoadProjectSettings.totalProjects;
    Debug.Log("SCROLLLLOLLOLOL = " + totalProjects);
    scrollList = new List<float>();
    float currentScroll = (1.0F / (float)(totalProjects - 1));
    float addScroll = currentScroll;
    Debug.Log((1 / totalProjects));
    /*for (int i = 0; i < 1; i++)
    {
      scrollList.Add(currentScroll);
      Debug.Log("currentScroll = " + currentScroll);
      currentScroll += addScroll;
    }
    while (currentScroll < 1F)
    {
      scrollList.Add(currentScroll);
      Debug.Log("currentScroll = " + currentScroll);
      currentScroll += addScroll;
    }
    projectScroll.numberOfSteps = totalProjects * 100;
    foreach (float item in scrollList)
    {
      Debug.Log("itemlist" +item);
      //Debug.Log(scrollList[0]);
    }*/
	}
	
	// Update is called once per frame
  public void UpdateScrollbar()
  {

    /*Debug.Log("SCROLLLLOLLOLOL = " + totalProjects);
    Random r = new Random();
    projectScroll.numberOfSteps = totalProjects*10;*/

  }
	void Update () 
  {

	}
  public void OnSlide()
  {/*
    float value = projectScroll.value;

    if (value > scrollList[0])
    {
      projectScroll.numberOfSteps = totalProjects;
    }
    */
  }
  public void ChangeValue ()
  {  
    /*float value = projectScroll.value;
    for (int i = 0; i < scrollList.Count; i++)
			{
        Debug.Log("value = " + projectScroll.value);
        if (0F < value && value < scrollList[i]) //value = 0,4
        {
          float downValue = Mathf.Abs(value - 0); //dichter bij 0 -> 0.4
          float upValue = Mathf.Abs(value - scrollList[i]); //dichter bij i -> 0.1
          if (downValue > upValue) //dichter bij 0
          {
            Debug.Log("dichter bij 0");
            projectScroll.value = 0;
          }
          projectScroll.value = scrollList[i];
          Debug.Log("dichter bij scrollList[i]");
        }
        if (scrollList[i] < value && value < 1F) //value = 0,6
        {
          float downValue = Mathf.Abs(value - 1); //dichter bij 1 -> 0.2
          float upValue = Mathf.Abs(value - scrollList[i]); //dichter bij i -> 0.1
          if (downValue < upValue) //dichter bij 1
          {
            Debug.Log("dichter bij 1");
            projectScroll.value = 1;
          }
          else 
          {
            projectScroll.value = scrollList[i];
            Debug.Log("dichter bij scrollList[i]");
          }
        }
			}*/
  }

  /*IEnumerator wait()
  {
    /*
    yield return new WaitForSeconds(1);
    projectScroll.numberOfSteps = totalProjects;
    yield return new WaitForSeconds(1);
    projectScroll.numberOfSteps = (totalProjects *100);
    ChangeValue();
    
  }*/
}
