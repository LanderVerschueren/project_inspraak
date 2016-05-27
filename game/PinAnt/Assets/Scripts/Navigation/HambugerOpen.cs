using UnityEngine;
using System.Collections;

public class HambugerOpen : MonoBehaviour {

	// Use this for initialization
  private Vector3 startPosition;
  private Vector3 endPosition;

  private Vector3 newPosition;

  public GameObject tapMenu;
  public GameObject tapMenuStart;

  public int speed = 6;

  public static bool isOpen;

  void Start()
  {
    endPosition = tapMenu.transform.position;
    startPosition = tapMenuStart.transform.position;
    newPosition = startPosition;
  }
  void Update()
  {
    isChanging();
  }

  public void isChanging()
  {
    if (isOpen)
    {
      tapMenu.SetActive(true);
      newPosition = endPosition;
    }
    if (isOpen == false)
    {
      newPosition = startPosition;
    }
    tapMenu.transform.position = Vector3.Lerp(tapMenu.transform.position, newPosition, Time.deltaTime * speed);
  }

  public void ChangePosition()
  {
    Debug.Log("CLICK");
    isOpen = true;
  }
  public void Reset()
  {
    newPosition = startPosition;
  }
}
