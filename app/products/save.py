import os

i=0
while True:
    i += 1
    print(f"{i}.png ...")
    input()
    os.system(f"xclip -selection clipboard -t image/png -o > {i}.png")
